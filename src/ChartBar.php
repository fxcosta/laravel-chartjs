<?php namespace Fx3costa\Laravelchartjs;

use Fx3costa\Laravelchartjs\Contracts\Chartjs;

class ChartBar implements Chartjs
{

    /**
     * @var array
     */
    protected $colours = array();

    /**
     * @param array $colours
     */
    public function __construct(array $colours)
    {
        $this->colours = $colours;
    }


    /**
     * Prepare the data that was received to be compatible with the requirements of chartjs
     *
     * @param $canvas
     * @param array $dados
     * @return $this
     */
    public function render($canvas, array $dados)
    {
        $qtdDatasets = 0; // datasets quatity
        $dataset = array();
        $colours = array();
        $labels = array();

        // Datasets quantity
        foreach($dados as $label => $dado) {
            count($dado) > $qtdDatasets ? $qtdDatasets = count($dado) : $qtdDatasets+=0;
        }

        $labels = array_keys($dados);

        // Especially to group the datasets in the right way considering the index of data array
        for($i = 0; $i < $qtdDatasets; $i++) {
            $dataset[$i] = array_column($dados, $i);
            $dataset[$i] = implode(", ", $dataset[$i]);
            $colours[$i] = $this->colours[$i];
        }

        return view('chart-bar::chart-bar')
            ->with(['element' => $canvas,
                    'dataset' => $dataset,
                    'labels' => $labels,
                    'colours' => $colours,
                    'qtdDatasets' => $qtdDatasets
            ]);

    }
}