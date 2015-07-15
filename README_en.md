# laravel-chartjs - Chart.js graphics to Laravel 5.x
This is a simple package that enables to use simple and quick reports and graphs 
using the [Chart.js](http://www.chartjs.org/) Javascript library from Nick Downie.


# Setup:
```
composer require fx3costa/laravelchartjs
```

And add the Service Provider in your file config/app.php:
```
Fx3costa\Laravelchartjs\ChartjsServiceProvider::class
```

For now, you must install and add to your layouts / templates the Chartjs library that can be easily 
found for download at: http://www.chartjs.org. This setting will also be improved.

# Usage:
Example of simple use, in a view or whatever you want to display the graphic:
```
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

{!! app()->chartjs->render("GraficoBarra", $data) !!}
```
Where $data is an array of information, the key serves as Label and the value is the value of the information itself.

# OBS:
This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions, mail me:
fx3costa@gmail.com
