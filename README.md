# laravel-chartjs - Chart.js charts to Laravel 5.x

This is a simple package that enables to use simple and quick reports and charts
using the [Chart.js](http://www.chartjs.org/) Javascript library from Nick Downie.


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
Example of simple use, in a view or whatever you want to display the chart:

1 - Bar Chart:
```php
<div class="container-fluid">
    <canvas id="BarChart" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Jan' => array(33),
        'Feb' => array(32),
        'Mar' => array(12)
    );
?>

{!! app()->chartbar->render("BarChart", $data) !!}
```
Where $data is an array of information, the key serves as Label and the value is the value of the information itself.
If you need more than one dataset - ie two data to the same label as if it were old and current value - just add values to the value of array, for example: 'March' => array (12, 25,. .., n)

2 - Pie or Doughnut Chart:
```php
<div class="container-fluid">
    <canvas id="PieChart" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Ferdinand' => 32,
        'Felix' => 37,
        'John' => 12
    );
?>

{!! app()->chartpiedoughnut->render("PieChart", $data, ['type' => 'Doughnut']) !!}

{{-- OR --}}

{!! app()->chartpiedoughnut->render("PieChart", $data, ['type' => 'Pie']) !!}
```
Where $data is an array of information, the key serves as Label and the value is the value of the information itself. The color and highlight color is random according to what was defined in the configuration file

3 - Radar Chart:
```php
<div class="container-fluid">
    <canvas id="RadarChart" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Eating' => array(33, 34),
        'Coding' => array(32, 123),
        'Sleeping' => array(12, 90)
    );
?>

{!! app()->chartradar->render("RadarChart", $data) !!}
```

4 - Line Chart:
```php
<div class="container-fluid">
    <canvas id="LineChart" style="width:50%;"></canvas>
</div>

<?php
    $data = array(
        'Eating' => array(33, 34),
        'Coding' => array(32, 123),
        'Sleeping' => array(12, 90)
    );
?>

{!! app()->chartline->render("LineChart", $data) !!}
```

For legends in chart just use like this:

```php
<div class="container-fluid">
    <canvas id="RadarChart" style="width:50%;"></canvas>
</div>
<!-- For every chart, use a respective css id selector: bar, radar, pie or line -->
<div id="js-legend-bar" class="chart-legend"></div>
<div id="js-legend-pie" class="chart-legend"></div>
<div id="js-legend-line" class="chart-legend"></div>

<?php
// options array with legends to show in this chart
$options['legends'] = ['Marketing', 'IT', 'Stock'];

$data = array(
        'Jan' => array(33.4, 59, 100),
        'Feb' => array(32.8, 45, 150),
        'Mar' => array(12, 38.3, 125)
);

?>
{!! app()->chartbar->render("RadarChart", $data, $options) !!}
```

# TODO:
- [ ] Refactoring for a better JS code
- [ ] Tests
- [ ] Polar Area Chart support
- [ ] Remove framework dependency: Illuminate packages dependencies only


# OBS:
This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions, mail me:
fx3costa@gmail.com
