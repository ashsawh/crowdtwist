<?php

namespace Crowdtwist\Lib;

/**
 * Class SSD
 * @package Crowdtwist\Lib
 */
class SSD extends BaseDiskStorage implements DiskStorage {
    const WRITE_SPEED = 100;
    const READ_SPEED = 200;
}
