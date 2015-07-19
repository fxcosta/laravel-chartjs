<?php namespace Fx3costa\Laravelchartjs;

class ChartPie {

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

        foreach($dados as $label => $dado)
        {
            if(isset($this->colours[$iterator]))
            {
                $data[$iterator]['label'] = $label;
                $data[$iterator]['value'] = $dado;
                $data[$iterator]['highlight'] = $this->colours[$iterator]['highlight'];
                $data[$iterator]['colour'] = $this->colours[$iterator]['colour'];
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