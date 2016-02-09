<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Chart Colors Configuration
    |--------------------------------------------------------------------------
    |
    | This section defines the default colors to be used for each type of chart
    | and what are the colors of each dataset that is used. Consequently, increasing the
    | number of datasets, you must increase the colors.
    |
    */
    'colours' => [

        'line' => [
            'rgba(220,220,220,0.2)',
            'rgba(24, 164, 103, 0.7)',
            'rgba(151,187,205,0.2)',
            'rgba(24, 164, 103, 0.7)',
        ],

        'bar' => [
            'rgba(220,220,220,0.5)',
            'rgba(151,187,205,0.8)',
            'rgba(24, 164, 103, 0.7)',
        ],

        'radar' => [
            'rgba(220,220,220,0.2)',
            'rgba(24, 164, 103, 0.7)',
            'rgba(151,187,205,0.2)',
            'rgba(24, 164, 103, 0.7)',
        ],

        /**
         * If the number of data exceeds the number of colors configured,
         * the data will use default color definied in ChartPieAndDougnhut.php
         */
        'pie' => [
            [
                'colour' => "#F7464A",
                'highlight' => "#FF5A5E"
            ],
            [
                'colour' => "#46BFBD",
                'highlight' => "#5AD3D1"
            ],
            [
                'colour' => "#FDB45C",
                'highlight' => "#FFC870"
            ],

        ]
    ],


    /*
    |--------------------------------------------------------------------------
    |
    |--------------------------------------------------------------------------
    |
    */

];