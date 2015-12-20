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
}
