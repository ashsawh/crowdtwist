<?php

namespace Crowdtwist\Lib;

use Crowdtwist\Contracts\Output;
/**
 * Class Display
 * @package Crowdtwist\Lib
 */
class Display implements Output {
    protected $chamber;
    protected $contents;
    const TILE = '.';

    function __construct()
    {
	$this->contents = array();
    }

    public function getChamberSize()
    {
        return $this->length;
    }

    public function cycle()
    {
	$line = '';
        for($i = 0; $i < $this->length; $i++)
        {
	    $line .= isset($this->chamber[$i]) ? 'X' : self::TILE;
            #echo isset($this->chamber[$i]) ? 'X' : self::TILE;
        }
	$this->contents[] = $line;
        #echo "\r\n";
    }

    public function show()
    {
	return $this->contents;
    }

    public function setChamber($chamber)
    {
        $this->chamber = $chamber;
    }

    public function initialize($init)
    {
        $this->length = strlen($init);
        $init = str_split($init);
        foreach($init as $pos => $char) {
            if($char !== self::TILE) {
                $this->chamber[$pos] = [ $char ];
            }
        }
        return $this->chamber;
    }
}
