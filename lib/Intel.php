<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\CPU;

/**
 * Class Intel
 * @package Crowdtwist\Lib
 */
class Intel implements CPU {
    public function process(\Closure $closure)
    {
        return $closure();
    }
}
