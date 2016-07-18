<?php
use PHPUnit\Framework\TestCase;
use Crowdtwist\Lib\Display;
use Crowdtwist\Lib\CrowdtwistAnimator;

class AnimatorTest extends TestCase
{
    public function setUp() 
    {
	$this->animator = new CrowdtwistAnimator(new Display());
    }

    public function testAnimateWithSingleLoad() 
    {
	$result =  [ "..X....", "....X..", "......X", "......." ];
	$this->assertEquals($result, $this->animator->animate(2,  "..R....")); 
    }

    public function testAnimateWithFiveEntries()
    {
	$result = [ "XX..XXX",  ".X.XX..",  "X.....X",  "......." ];
	$this->assertEquals($result, $this->animator->animate(3, "RR..LRL"));
    }

    public function testAnimateWithEightEntries()
    {
        $result = [ "XXXX.XXXX",  "X..X.X..X",  ".X.X.X.X.",  ".X.....X.",  "........." ];
        $this->assertEquals($result, $this->animator->animate(2, "LRLR.LRLR"));
    }

    public function testAnimateWithTenEntries()
    {
        $result = [ "XXXXXXXXXX",  ".........." ];
        $this->assertEquals($result, $this->animator->animate(10, "RLRLRLRLRL"));
    }

    public function testAnimateWithOneEntries()
    {
        $result = [ "..." ];
        $this->assertEquals($result, $this->animator->animate(1,  "..."));
    }	
 
    public function testAnimateWithMaxEntries()
    {
        $result = [ "XXXX.XX.XXX.X.XXXX.",  "..XXX..X..XX.X..XX.",  ".X.XX.X.X..XX.XX.XX",  "X.X.XX...X.XXXXX..X",  ".X..XXX...X..XX.X..",  "X..X..XX.X.XX.XX.X.",  "..X....XX..XX..XX.X",  ".X.....XXXX..X..XX.",  "X.....X..XX...X..XX",  ".....X..X.XX...X..X",  "....X..X...XX...X..",  "...X..X.....XX...X.",  "..X..X.......XX...X",  ".X..X.........XX...",  "X..X...........XX..",  "..X.............XX.",  ".X...............XX",  "X.................X",  "..................." ];
        $this->assertEquals($result, $this->animator->animate(1,  "LRRL.LR.LRR.R.LRRL."));
    }

}
