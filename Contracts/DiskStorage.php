<?php

namespace Crowdtwist\Contracts;
/**
 * Interface DiskStorage
 * @package Crowdtwist\Contracts
 *
 * Data persistance layer. Stores data, and returns both write and read speeds which are established by class constants.
 *
 */
interface DiskStorage {
    public function store($data);
    public function getWriteSpeed();
    public function getReadSpeed();
}