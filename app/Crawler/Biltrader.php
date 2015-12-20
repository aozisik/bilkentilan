<?php

namespace App\Crawler;

use App\Classified;
use Goutte\Client;

class Biltrader
{
    private $crawler;
    private $categoryMapping;

    public function __construct()
    {
        $this->categoryMapping = [
            2 => 9, // Computer
            3 => 8, // Phone
            4 => 15, // Household,
            5 => 13, // Electronics,
            7 => 19, // Private lessons
            8 => 27, // Text books
        ];
    }

    public function handle($url)
    {
        $goutte = new Client();
        $this->crawler = $goutte->request('GET', $url);
    }

    private function filterText($text)
    {
        $text = str_replace("\n", '', $text);
        $text = str_replace("\r", '', $text);
        return e(trim($text));
    }

    private function mapToModel($mapping, $class)
    {
        $class = new $class;

        foreach($mapping as $field => $value) {
            $class->$field = $this->filterText($value);
        }

        return $class;
    }

    public function getClassified()
    {
        $mainCategory = $this->crawler->filter('span.heading > a.headingLink')->first()->attr('href');
        $mainCategory = str_replace('subCategory.jsp?mainId=', '', $mainCategory);

        $category = $this->categoryMapping[intval($mainCategory)];

        $mapping = [
            'title' => $this->crawler->filter('span.itemheading')->text(),
            'description' => $this->crawler->filter('.normaltext')->text(),
            'price' => intval($this->crawler->filter('.price')->text()),
            'category_id' => $category,
            'quantity' => 1,
        ];

        return $this->mapToModel($mapping, Classified::class);
    }
}