<?php

namespace Crowdtwist\Lib;

/**
 * Class BaseComputer
 * @package Crowdtwist\Lib
 *
 * @implements Crowdtwist\Contracts\Computer
 *
 * Base computer requires a DiskStorage, GPU and CPU devices.
 * Math equation in the form of a closure is processed by the CPU, persisted by the HDD and finally dispayed by the GPU.
 */
abstract class BaseComputer implements Computer {
    protected $hdd;
    protected $cpu;
    protected $gpu;
    protected $state = false;
    protected $memory;

    function __construct(DiskStorage $disk, GPU $gpu, CPU $cpu) {
        $this->hdd = $disk;
        $this->gpu = $gpu;
        $this->cpu = $cpu;
    }

    public function power()
    {
        $this->state = $this->state ? false : true;
        return $this;
    }

    public function doMath($x, $y)
    {
        $result = $this->cpu->process(function() use ($x, $y) {
            return $x + $y;
        });
        $this->store($result);
        return $this->display($result);
    }

    protected function display($data) {
        $this->gpu->put($data);
        $this->gpu->show();
    }

    protected function save($data)
    {
        $this->hdd->store($data);
    }
}