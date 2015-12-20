<?php

namespace App\Console\Commands;

use App\Crawler\Biltrader;
use App\User;
use Illuminate\Console\Command;
use Exception;
use Carbon\Carbon;

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

    protected function getUser($eUser)
    {
        $user = User::where('email', $eUser->email)->first();

        if (!$user) {
            $this->info('Added user <'.$eUser->email.'>');
            $eUser->save();
            $user = $eUser;
        }

        return $user;
    }

    public function crawl($id)
    {
        $url = 'http://goto.bilkent.edu.tr/trader/viewItem.jsp?itemId=' . $id;
        $this->info('Crawling ' . $url);

        $crawler = new Biltrader();
        $crawler->handle($url);

        $user = $this->getUser($crawler->getUser());
        $classified = $crawler->getClassified();

        $classified->user_id = $user->id;
        $classified->expires_at = Carbon::now()->addDays(30);
        $classified->is_imported = true;
        $classified->save();

        $this->comment('Added Classified: "'.$classified->title.'"');
    }
}
