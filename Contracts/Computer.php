<?php

namespace Crowdtwist\Contracts;

/**
 * Interface Computer
 * @package Crowdtwist\Contracts
 *
 * Ensures all computers have the ability to turn on and do math problems.
 */
interface Computer {
    public function power();
    public function doMath($x, $y);
}