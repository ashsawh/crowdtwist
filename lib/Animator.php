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

    public function prev($pos, $move)
    {
        return ($pos - $move) >= 0;
    }

    public function next($pos, $move)
    {
        return ($pos + $move) < $this->length;
    }

    public function unsetPosition($pos)
    {
        if(count($this->positions[$pos]) > 1) {
            array_shift($this->positions[$pos]);
        } else {
            unset($this->positions[$pos]);
        }
    }

    public function addPosition($pos, $dir)
    {
        $this->positions[$pos][] = $dir;
    }


    public function shiftLeft($pos) {
        if($this->prev($pos, $this->move)) {
            $this->addPosition($pos - $this->move, 'L');
        }
        $this->unsetPosition($pos);
    }

    public function shiftRight($pos) {
        if($this->next($pos, $this->move))
        {
            $this->addPosition($pos + $this->move, 'R');
        }
        $this->unsetPosition($pos);
    }

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

    private function cycleChamber()
    {
        $this->display->setChamber($this->positions);
        $this->display->cycle();
    }

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

    public function animate($speed, $init)
    {
        $this->positions = $this->display->initialize($init);
        $this->length = $this->display->getChamberSize();
        $this->move = $speed;
        return $this->iterate();
    }
}
