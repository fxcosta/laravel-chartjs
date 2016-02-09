<?php namespace Fx3costa\Laravelchartjs;

use Fx3costa\Laravelchartjs\Contracts\Chartjs;

/**
 * Class ChartPie
 * @package Fx3costa\Laravelchartjs
 */
class ChartPieAndDoughnut implements Chartjs
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
     * @param $canvas
     * @param array $data
     * @param string $type
     * @return $this
     */
    public function render($canvas, array $data, array $options = null)
    {
        $dataQtd    = 0;
        $iterator   = 0;
        $finalData  = []; // new data array with multiples options

        // chart type: pie or doughnut
        isset($options['type']) ? $type = $options['type'] : $type = "Pie";

        isset($data) && count($data) > 0 ? $dataQtd = count($data) : null;

        foreach($data as $label => $dataInfo) {
            $finalData[$iterator]['label'] = $label;
            $finalData[$iterator]['value'] = $dataInfo;

            if(isset($this->colours[$iterator])) {
                $finalData[$iterator]['highlight'] = $this->colours[$iterator]['highlight'];
                $finalData[$iterator]['colour'] = $this->colours[$iterator]['colour'];
            } else {
                // if is not set colors, this is default color
                $finalData[$iterator]['highlight'] = "#D8D8D8";
                $finalData[$iterator]['colour'] = "#D8D8D8";
            }

            $iterator++;
        }

        return view('chart-pie-doughnut::chart-pie-doughnut')
            ->with(['element'   => $canvas,
                    'data'      => $finalData,
                    'qtdData'   => $dataQtd,
                    'type'      => $type
            ]);

    }
}