<?php
use PHPUnit\Framework\TestCase;
use Crowdtwist\Lib\Nvidia;
use Crowdtwist\Lib\SSD;
use Crowdtwist\Lib\Intel;
use Crowdtwist\Lib\Apple;
use Crowdtwist\Lib\PC;

class PCTest extends TestCase
{
    private $ssd;
    private $gpu;
    private $cpu;
    const MATH = 5;
 
    public function setUp()
    {
	$this->ssd = \Mockery::mock('Crowdtwist\Lib\SSD');
	#$this->ssd = \Mockery::mock(new SSD);
	$this->gpu = \Mockery::mock('Crowdtwist\Lib\Nvidia');
	$this->cpu = \Mockery::mock('Crowdtwist\Lib\Intel');
	$this->pc = new PC($this->ssd, $this->gpu, $this->cpu);
    }

    public function tearDown()
    {
	\Mockery::close();
    }

    public function testPower()
    {
        $this->assertEquals($this->pc->power(), true);
    }

    public function testDoMath()
    {
	$this->ssd->shouldReceive('store')->once();
	$this->gpu->shouldReceive('put')->once();
	$this->gpu->shouldReceive('show')->once()->andReturn(self::MATH);
	$this->cpu->shouldReceive('process')->once()->andReturn(self::MATH);
        $this->assertEquals(5, $this->pc->doMath(1, 4));
    }
}

