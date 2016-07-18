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

    /**
     * Interprets current chamber positions and draws the empty and active tiles
     */
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

    /**
     * Get drawn array of strings
     * @return array
     */
    public function show()
    {
	    return $this->contents;
    }

    /**
     * Accepts the chamber configuration used to draw
     * @param $chamber
     */
    public function setChamber($chamber)
    {
        $this->chamber = $chamber;
    }

    /**
     * Accepts the configuration and creates the chamber
     * @param $init string
     * @return mixed
     */
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
