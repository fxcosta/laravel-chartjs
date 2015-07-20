# laravel-chartjs - Chart.js graphs to Laravel 5.x

[README in Portuguese](https://github.com/fxcosta/laravel-chartjs/blob/master/README_pt-BR.md)

This is a simple package that enables to use simple and quick reports and graphs 
using the [Chart.js](http://www.chartjs.org/) Javascript library from Nick Downie.


# Setup:
```
composer require fx3costa/laravelchartjs
```

And add the Service Provider in your file config/app.php:
```php
Fx3costa\Laravelchartjs\ChartjsServiceProvider::class
```

Finally, publish the package to use a configuration file that allows dynamically choose the colors of the graphics according to the chart type and datasets.
```
php artisan vendor:publish
```

config file:
```php
<?php
return [
    'colours' => [
        'bar' => [
            'rgba(220,220,220,0.5)',
            'rgba(151,187,205,0.8)',
            'rgba(24, 164, 103, 0.7)',
        ],
        'pie' => [
            [
                'colour' => "#F7464A",
                'highlight' => "#FF5A5E"
            ],
        ]
    ],
];
```
Where we have color setting in accordance with the chart type and according to the number of datasets that you will use.

For now, you must install and add to your layouts / templates the Chartjs library that can be easily 
found for download at: http://www.chartjs.org. This setting will also be improved.

# Usage:
Example of simple use, in a view or whatever you want to display the graphic:

1 - Bar Chart:
```php
<div class="container-fluid">
    <canvas id="GraficoBarra" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Jan' => array(33),
        'Feb' => array(32),
        'Mar' => array(12)
    );
?>

{!! app()->chartbar->render("GraficoBarra", $data) !!}
```
Where $data is an array of information, the key serves as Label and the value is the value of the information itself.
If you need more than one dataset - ie two data to the same label as if it were old and current value - just add values to the value of array, for example: 'March' => array (12, 25,. .., n)

2 - Pie Chart:
```php
<div class="container-fluid">
    <canvas id="GraficoPie" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Ferdinand' => 32,
        'Felix' => 37,
        'John' => 12
    );
?>

{!! app()->chartpie->render("GraficoPie", $data) !!}
```
Where $data is an array of information, the key serves as Label and the value is the value of the information itself. The color and highlight color is random according to what was defined in the configuration file

# OBS:
This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions, mail me:
fx3costa@gmail.com
