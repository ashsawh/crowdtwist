<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\CPU;

/**
 * Class Intel
 * @package Crowdtwist\Lib
 *
 * Runs inputted closure and returns result, simulating processor.
 */
class Intel implements CPU {
    public function process(\Closure $closure)
    {
        return $closure();
    }
}
