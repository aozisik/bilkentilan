<?php

namespace App\Crawler;

use App\Classified;
use App\User;
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

        foreach ($mapping as $field => $value) {
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

    public function getUser()
    {
        $contact = $this->crawler->filter('td > .normaltext')->eq(1)->text();
        $explode = explode("\r\n", $contact);
        array_shift($explode); // discard first item

        $nameEnds = strpos($explode[0], '(');
        $name = trim(substr($explode[0], 0, $nameEnds));
        $phone = trim(substr($explode[0], $nameEnds, strlen($explode[0]) - $nameEnds));

        $phone = str_replace('( 0', '', $phone);
        $phone = str_replace(' )', '', $phone);

        $names = explode(" ", $name);
        $last_name = array_pop($names);
        $first_name = join(" ", $names);

        $email = trim(str_replace('Email:', '', $explode[1]));

        return $this->mapToModel(compact('first_name', 'last_name', 'phone', 'email'), User::class);
    }
}