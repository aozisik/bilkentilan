<?php

namespace App\Console\Commands;

use App\Crawler\Biltrader;
use Illuminate\Console\Command;
use Goutte\Client;

class BiltraderCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl classifieds from BilTrader';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start = $this->ask('Beginning ID');
        $end = $this->ask('Ending ID');

        for ($i = $start; $i <= $end; $i++) {
            $this->crawl($i);
        }
    }

    public function crawl($id)
    {
        $url = 'http://goto.bilkent.edu.tr/trader/viewItem.jsp?itemId=' . $id;
        $this->info('Crawling ' . $url);

        $crawler = new Biltrader();
        $crawler->handle($url);
    }
}
