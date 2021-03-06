<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\DiskStorage;

/**
 * Class HDD
 * @package Crowdtwist\Lib
 */
class HDD extends BaseDiskStorage implements DiskStorage {
    const WRITE_SPEED = 2;
    const READ_SPEED = 3;
}
