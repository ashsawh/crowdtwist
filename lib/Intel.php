<?php

namespace Crowdtwist\Lib;

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