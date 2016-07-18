<?php
namespace Crowdtwist\Contracts;

/**
 * Interface Output
 * @package Crowdtwist\Contracts
 */
interface Output {
    public function setChamber($positions);
    public function showChamber();
    public function getChamberSize();
    public function initialize($init);
}