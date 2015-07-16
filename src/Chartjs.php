<?php
/**
 * Created by PhpStorm.
 * User: fx3costa
 * Date: 13/07/2015
 * Time: 02:08
 */

namespace Fx3costa\Laravelchartjs;


class Chartjs {

    protected $colours = array();

    public function __construct(array $colours)
    {
        $this->colours = $colours;
    }


    //TODO: Se houver um dataset algum dado que não tenha sido informado, usar como 0
    public function render($canvas, array $dados)
    {
        $qtdDatasets = 0;
        $dataset = array();
        $colours = array();
        $labels = array();

        foreach($dados as $label => $dado)
        {
            count($dado) > $qtdDatasets ? $qtdDatasets = count($dado) : $qtdDatasets+=0;
        }

        $labels = array_keys($dados);

        for($i = 0; $i < $qtdDatasets; $i++)
        {
            $dataset[$i] = array_column($dados, $i);
            $dataset[$i] = implode(", ", $dataset[$i]);
            $colours[$i] = $this->colours[$i];
        }

        return view('chart::chart')->with(['elemento' => $canvas,
                                            'dataset' => $dataset,
                                            'labels' => $labels,
                                            'colours' => $colours,
                                            'qtdDatasets' => $qtdDatasets]);
    }
}