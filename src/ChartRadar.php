<?php namespace Fx3costa\Laravelchartjs;

use Fx3costa\Laravelchartjs\Contracts\Chartjs;

/**
 * Class ChartBar
 * @package Fx3costa\Laravelchartjs
 */
class ChartRadar implements Chartjs
{
    /**
     * @var array
     */
    protected $colours = [];

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
     * @param array $data
     * @return $this
     */
    public function render($canvas, array $data, array $options = null)
    {
        $datasetQnt = 0; // datasets quatity
        $dataset    = [];
        $colours    = [];
        $labels     = [];

        // Datasets quantity
        foreach($data as $label => $info) {
            count($info) > $datasetQnt ? $datasetQnt = count($info) : $datasetQnt += 0;
        }

        $labels = array_keys($data);

        // Especially to group the datasets in the right way considering the index of data array
        for($i = 0; $i < $datasetQnt; $i++) {
            $dataset[$i] = array_column($data, $i);
            $dataset[$i] = implode(", ", $dataset[$i]);
            $colours[$i] = $this->colours[$i];
        }

        return view('chart-radar::chart-radar')
            ->with(['element' => $canvas,
                    'dataset' => $dataset,
                    'labels' => $labels,
                    'colours' => $colours,
                    'qtdDatasets' => $datasetQnt
            ]);

    }
}