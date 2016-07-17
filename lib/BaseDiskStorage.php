<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\DiskStorage;

/**
 * Class BaseDiskStorage
 * @package Crowdtwist\Lib
 */
abstract class BaseDiskStorage implements DiskStorage {
    const WRITE_SPEED = 1;
    const READ_SPEED = 2;
    protected $platter;

    public function store($data) {
        $this->platter[] = $data;
    }

    public function getWriteSpeed()
    {
        return self::WRITE_SPEED;
    }

    public function getReadSpeed()
    {
        return self::READ_SPEED;
    }
}
