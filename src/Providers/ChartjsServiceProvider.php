<?php namespace Fx3costa\LaravelChartJs\Providers;

use Fx3costa\LaravelChartJs\Builder;
use Fx3costa\LaravelChartJs\ChartBar;
use Fx3costa\LaravelChartJs\ChartLine;
use Fx3costa\LaravelChartJs\ChartPieAndDoughnut;
use Fx3costa\LaravelChartJs\ChartRadar;
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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-template');
        $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chartjs', function() {
            return new Builder();
        });
    }
}
