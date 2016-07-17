<?php
use PHPUnit\Framework\TestCase;
use Crowdtwist\Lib\Nvidia;
use Crowdtwist\Lib\SSD;
use Crowdtwist\Lib\Intel;


class MoneyTest extends TestCase
{
    private $hd;
    private $gpu;
    private $cpu;

    public function setUp()
    {
	$this->gpu = new Nvidia();
	$this->cpu = new Intel();
	$this->hd = new SSD();
    }

    public function testPower()
    {
	$apple = new Apple($this->hd, $this->gpu, $this->cpu);
	$this->assertEquals($apple->power(), true);
    }

    public function testDoMath() 
    {
	$pc = new PC($this->hd, $this->gpu, $this->cpu);
	$this->assertEquals(5, $this->pc->doMath(1, 4));
    }
}
