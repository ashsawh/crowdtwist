<?php

namespace Crowdtwist\Lib;
use Crowdtwist\Contracts\GPU;

/**
 * Class Nvidia
 * @package Crowdtwist\Lib
 */
class Nvidia implements GPU {
    protected $input;

    public function put($input)
    { 
        $this->input = $input;
    }

    public function show()
    {
        return $this->input;
    }
}
