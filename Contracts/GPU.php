<?php

namespace Crowdtwist\Contracts;

/**
 * Interface GPU
 * @package Crowdtwist\Contracts
 *
 * Takes in data through put and displays it through stdout
 */
interface GPU {
    public function put($input);
    public function show();
}