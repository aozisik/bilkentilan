<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BiltraderTest extends TestCase
{
    private $biltrader;

    public function setUp() {
        parent::setUp();
        $this->biltrader = new \App\Crawler\Biltrader();
        $this->biltrader->handle('http://goto.bilkent.edu.tr/trader/viewItem.jsp?itemId=50436');
    }
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testItExtractsClassified()
    {
        $classified = $this->biltrader->getClassified();

        $this->assertEquals('ipad 3', $classified->title);
        $this->assertEquals('16gb wifi. kullanmadigim icin satiyorum.', $classified->description);
        $this->assertEquals(480, $classified->price);
        $this->assertEquals(13, $classified->category_id);
    }

    public function testItExtractsUser()
    {
        $this->biltrader->handle('http://goto.bilkent.edu.tr/trader/viewItem.jsp?itemId=50432');

        $user = $this->biltrader->getUser();

        $this->assertEquals('Ahmet', $user->first_name);
        $this->assertEquals('Varol', $user->last_name);
        $this->assertEquals('ahmet.varol@ug.bilkent.edu.tr', $user->email);
        $this->assertEquals('5387792956', $user->phone);
    }
}
