<?php

namespace Crowdtwist\Lib;

/**
 * Class Display
 * @package Crowdtwist\Lib
 */
class Display implements Output {
    protected $chamber;
    const TILE = '.';

    public function getChamberSize()
    {
        return $this->length;
    }

    public function showChamber()
    {
        for($i = 0; $i < $this->length; $i++)
        {
            echo isset($this->chamber[$i]) ? 'X' : self::TILE;
        }
        echo "\r\n";
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