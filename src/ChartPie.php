<?php namespace Fx3costa\Laravelchartjs;

use Fx3costa\Laravelchartjs\Contracts\Chartjs;

class ChartPie implements Chartjs
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
        $qtdData = 0;
        $iterator = 0;
        $data = array(); // new data array with multiples options

        isset($dados) && count($dados) > 0 ? $qtdData = count($dados) : null;

        foreach($dados as $label => $dado) {
            $data[$iterator]['label'] = $label;
            $data[$iterator]['value'] = $dado;

            if(isset($this->colours[$iterator])) {
                $data[$iterator]['highlight'] = $this->colours[$iterator]['highlight'];
                $data[$iterator]['colour'] = $this->colours[$iterator]['colour'];
            }
            else {
                // if is not set colors, this is default color
                $data[$iterator]['highlight'] = "#D8D8D8";
                $data[$iterator]['colour'] = "#D8D8D8";
            }

            $iterator++;
        }

        return view('chart-pie::chart-pie')
            ->with(['element' => $canvas,
                    'data' => $data,
                    'qtdData' => $qtdData
            ]);

    }
}