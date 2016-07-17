<?php
use PHPUnit\Framework\TestCase;
use Crowdtwist\Lib\Nvidia;
use Crowdtwist\Lib\SSD;

class SSDTest extends TestCase
{
    private $ssd;

    public function setUp() 
    {
	$this->ssd = new SSD();	
    }

    public function testReadSpeed()
    {
	$this->assertInternalType("int", $this->ssd->getReadSpeed());
    }

    public function testWriteSpeed()
    {
	$this->assertGreaterThan($this->ssd->getWriteSpeed(), 5);
    }
}
