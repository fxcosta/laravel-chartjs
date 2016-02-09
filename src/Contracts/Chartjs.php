<?php namespace Fx3costa\Laravelchartjs\Contracts;

/**
 * Interface ChartjsInterface
 * @package Fx3costa\Laravelchartjs
 */
interface Chartjs
{
    /**
     * This method is a contract for all charts implements
     * Prepare the data that was received to be compatible with the requirements of chartjs
     *
     * @param $canvas
     * @param array $data
     * @param $options
     * @return mixed
     */
    public function render($canvas, array $data, array $options = null);
}