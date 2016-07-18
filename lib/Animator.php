<?php

namespace Crowdtwist\Lib;

use Crowdtwist\Contracts\Display;
use Crowdtwist\Contracts\Animation;
use Crowdtwist\Contracts\Output;

/**
 * Class CrowdtwistAnimator
 * @package Crowdtwist\Lib
 */
class CrowdtwistAnimator implements Animation {
    function __construct(Output $display)
    {
        $this->display = $display;
    }

    /**
     * Asserts that the position is not a negative given that chamber only holds positive increments
     *
     * @param $pos
     * @param $move
     * @return bool
     */
    public function prev($pos, $move)
    {
        return ($pos - $move) >= 0;
    }

    /**
     * Asserts that the position isn't larger than the chamber initial size
     *
     * @param $pos
     * @param $move
     * @return bool
     */
    public function next($pos, $move)
    {
        return ($pos + $move) < $this->length;
    }

    /**
     * Unset a stored position upon directional movement
     *
     * @param $pos
     */
    public function unsetPosition($pos)
    {
        if(count($this->positions[$pos]) > 1) {
            array_shift($this->positions[$pos]);
        } else {
            unset($this->positions[$pos]);
        }
    }

    /**
     * Add position based on directional movement
     *
     * @param $pos
     * @param $dir
     */
    public function addPosition($pos, $dir)
    {
        $this->positions[$pos][] = $dir;
    }

    /**
     * Shift a tile left
     *
     * @param $pos
     */
    public function shiftLeft($pos) {
        if($this->prev($pos, $this->move)) {
            $this->addPosition($pos - $this->move, 'L');
        }
        $this->unsetPosition($pos);
    }

    /**
     * Shift a tile right
     * @param $pos
     */
    public function shiftRight($pos) {
        if($this->next($pos, $this->move))
        {
            $this->addPosition($pos + $this->move, 'R');
        }
        $this->unsetPosition($pos);
    }

    /**
     * Cycle for each time
     */
    public function move()
    {
        foreach($this->positions as $pos => $dirs)
        {
            foreach($dirs as $dir)
            {
                $dir == 'L' ? $this->shiftLeft($pos) : $this->shiftRight($pos);
            }
        }
    }

    /**
     * Add current chamber configuration and draw it
     */
    private function cycleChamber()
    {
        $this->display->setChamber($this->positions);
        $this->display->cycle();
    }

    /**
     * Cycle through from initial position until empty
     * @return mixed
     */
    public function iterate()
    {
        while(!empty($this->positions))
        {
            $this->cycleChamber();
            $this->move($this->move);
        }
        $this->cycleChamber();
	    return $this->display->show();
    }

    /**
     * @param $speed
     * @param $init
     * @return mixed
     */
    public function animate($speed, $init)
    {
        $this->positions = $this->display->initialize($init);
        $this->length = $this->display->getChamberSize();
        $this->move = $speed;
        return $this->iterate();
    }
}
