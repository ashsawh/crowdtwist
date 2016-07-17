<?php
use PHPUnit\Framework\TestCase;
use Crowdtwist\Lib\Nvidia;
use Crowdtwist\Lib\SSD;
use Crowdtwist\Lib\Intel;
use Crowdtwist\Lib\Apple;
use Crowdtwist\Lib\PC;

class AppleTest extends TestCase
{
    private $hd;
    private $gpu;
    private $cpu;

    public function setUp()
    {
	$this->gpu = new Nvidia();
	$this->cpu = new Intel();
	$this->hd = new SSD();
	$this->apple = new Apple($this->hd, $this->gpu, $this->cpu);
    }

    public function testPower()
    {
	$this->assertEquals($this->apple->power(), true);
    }

    public function testDoMath() 
    {
	$this->assertEquals(5, $this->apple->doMath(1, 4));
    }
}
