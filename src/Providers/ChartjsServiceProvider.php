<?php namespace Fx3costa\Laravelchartjs\Providers;

use Fx3costa\Laravelchartjs\ChartBar;
use Fx3costa\Laravelchartjs\ChartLine;
use Fx3costa\Laravelchartjs\ChartPieAndDoughnut;
use Fx3costa\Laravelchartjs\ChartPolar;
use Fx3costa\Laravelchartjs\ChartRadar;
use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider
{

    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];

    public function boot()
    {
        $this->publishes([__DIR__.'/../config/chartjs.php' => config_path('chartjs.php')]);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'autoload');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-bar');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-line');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-radar');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-pie-doughnut');
        $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chartbar', function() {
            return new ChartBar($this->colours['bar']);
        });

        $this->app->bind('chartline', function() {
            return new ChartLine($this->colours['line']);
        });

        $this->app->bind('chartpiedoughnut', function() {
            return new ChartPieAndDoughnut($this->colours['pie']);
        });

        $this->app->bind('chartradar', function() {
            return new ChartRadar($this->colours['radar']);
        });
    }
}
