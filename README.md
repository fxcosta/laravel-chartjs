
# laravel-chartjs - Chart.js v2 wrapper for Laravel 5.x

Simple package to facilitate and automate the use of charts in Laravel 5.x
using the [Chart.js](http://www.chartjs.org/) v2 library from Nick Downie.

# Setup:
```
composer require fx3costa/laravelchartjs
```

And add the Service Provider in your file config/app.php:
```php
Fx3costa\LaravelChartJs\Providers\ChartjsServiceProvider::class
```

Finaly, for now, you must install and add to your layouts / templates the Chartjs library that can be easily
found for download at: http://www.chartjs.org. This setting will also be improved.

# Usage:

You can request to Service Container the service responsible for building the charts
and passing through fluent interface the chart settings.

```php
$service = app()->chartjs
    ->name()
    ->type()
    ->size()
    ->labels()
    ->datasets()
    ->options();
```

For now the builder needs the name of the chart, the type of chart that can be anything that is supported by chartjs and the other custom configurations like labels, datasets, size and options.

In the dataset interface you can pass any configuration and option to your chart.
All options available in chartjs documentation are supported.
Just write the configuration with php array notations and its work!

# Advanced chartjs options

Since the current version allows it to add simple json string based options, it is not possible to generate options like:

```php
    options: {
        scales: {
            xAxes: [{
                type: 'time',
                time: {
                    displayFormats: {
                        quarter: 'MMM YYYY'
                    }
                }
            }]
        }
    }
```

Using the method optionsRaw(string) its possible to add a the options in raw format:

Passing string format like a json
```php
        $chart->optionsRaw("{
            legend: {
                display:false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    }  
                }]
            }
        }");
```

Or, if your prefer, you can pass a php array format

```php
$chart->optionsRaw([
    'legend' => [
        'display' => true,
        'labels' => [
            'fontColor' => '#000'
        ]
    ],
    'scales' => [
        'xAxes' => [
            [
                'stacked' => true,
                'gridLines' => [
                    'display' => true
                ]
            ]
        ]
    ]
]);
```


# Examples

1 - Line Chart / Radar Chart:
```php
// ExampleController.php

$chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);

return view('example', compact('chartjs'));


 // example.blade.php

<div style="width:75%;">
    {!! $chartjs->render() !!}
</div>
```


2 - Bar Chart:
```php
// ExampleController.php

$chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels(['Label x', 'Label y'])
         ->datasets([
             [
                 "label" => "My First dataset",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                 'data' => [69, 59]
             ],
             [
                 "label" => "My First dataset",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                 'data' => [65, 12]
             ]
         ])
         ->options([]);

return view('example', compact('chartjs'));


 // example.blade.php

<div style="width:75%;">
    {!! $chartjs->render() !!}
</div>
```


3 - Pie Chart / Doughnut Chart:
```php
// ExampleController.php

$chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [69, 59]
            ]
        ])
        ->options([]);

return view('example', compact('chartjs'));


 // example.blade.php

<div style="width:75%;">
    {!! $chartjs->render() !!}
</div>
```


# OBS:

This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions preferably open a issue!

# License
LaravelChartJs is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
