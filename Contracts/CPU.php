<?php

namespace Crowdtwist\Contracts;

/**
 * Class HDD
 * @package Crowdtwist\Contracts
 *
 * Process closures and returns results.
 *
 */
interface CPU {
    public function process(\Closure $closure);
}
