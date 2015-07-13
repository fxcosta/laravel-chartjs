<?php
/**
 * Created by PhpStorm.
 * User: fx3costa
 * Date: 13/07/2015
 * Time: 02:08
 */

namespace Fx3costa\Laravelchartjs;


class Chartjs {

    public function __construct()
    {

    }

    public function render($canvas, array $dados)
    {
        return view('chart::chart')->with(['elemento' => $canvas, 'dados' => $dados]);
    }
}