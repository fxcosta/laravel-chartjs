<?php namespace Fx3costa\Laravelchartjs;

use Fx3costa\Laravelchartjs\Contracts\Chartjs;

/**
 * Class ChartBar
 * @package Fx3costa\Laravelchartjs
 */
class ChartBar implements Chartjs
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
     * @param array|null $options
     * @return $this
     */
    public function render($canvas, array $data, array $options = null)
    {
        $datasetQnt = 0; // datasets quatity
        $dataset    = [];
        $colours    = [];
        $labels     = [];
        $legends    = [];

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

            $this->verifyLegendChartExist($options['legends']) ?
                $legends[$i] = $options['legends'][$i] : $legends[$i] = 'My dataset '.($i+1);
        }

        return view('chart-bar::chart-bar')
            ->with(['element'       => $canvas,
                    'dataset'       => $dataset,
                    'labels'        => $labels,
                    'legends'       => $legends,
                    'colours'       => $colours,
                    'qtdDatasets'   => $datasetQnt
            ]);

    }

    /**
     * @param $legends
     * @return bool
     */
    private function verifyLegendChartExist($legends)
    {
        if(isset($legends)) {
            return true;
        }

        return false;
    }
}