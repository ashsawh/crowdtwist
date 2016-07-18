<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\Computer;
use Crowdtwist\Contracts\DiskStorage;
use Crowdtwist\Contracts\GPU;
use Crowdtwist\Contracts\CPU;

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

    /**
     * Toggle on/off computer state
     * State is stored as a bool
     * @return bool
     */
    public function power()
    {
        $this->state = $this->state ? false : true;
        return $this->state;
    }

    /**
     * Accepts two parameters and creates a closure that is then run by the CPU with the result stored in the SSD and
     * displayed by the GPU
     *
     * @param $x integer
     * @param $y integer
     * @return mixed
     */
    public function doMath($x, $y)
    {
        $result = $this->cpu->process(function() use ($x, $y) {
            return $x + $y;
        });
        $this->save($result);
        return $this->display($result);
    }

    /**
     * Pushes data to the GPU which is then parsed and shown
     *
     * @param $data mixed
     * @return mixed
     */
    protected function display($data) {
        $this->gpu->put($data);
        return $this->gpu->show();
    }

    /**
     * Persist data in storage device
     *
     * @param $data
     */
    protected function save($data)
    {
        $this->hdd->store($data);
    }
}
