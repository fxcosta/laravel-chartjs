# laravel-chartjs - Chart.js v2 wrapper for Laravel 5.x

Simple package to facilitate and automate the use of charts in Laravel 5.x
using the [Chart.js](http://www.chartjs.org/) v2 library from Nick Downie.

# Setup:
```
composer require fx3costa/laravelchartjs
```

And add the Service Provider in your file config/app.php:
```php
Fx3costa\Laravelchartjs\Providers\ChartjsServiceProvider::class
```

Finally, publish the package to use a configuration file that allows dynamically choose the colors of the graphics according to the chart type and datasets.
```
php artisan vendor:publish
```

For now, you must install and add to your layouts / templates the Chartjs library that can be easily
found for download at: http://www.chartjs.org. This setting will also be improved.

# Usage:
Example of simple use, in a view or whatever you want to display the chart:

1 - Line Chart:
```php
// ExampleController.php

$chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->element('lineChartTest')
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
    <canvas id="lineChartTest">
        {!! $chartjs->render() !!}
    </canvas>
</div>
```


# OBS:
This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions, mail me:
fx3costa@gmail.com
