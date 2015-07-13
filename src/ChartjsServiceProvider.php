<?php namespace Fx3costa\Laravelchartjs;


use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'chart');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('chartjs', function() {
            return new Chartjs();
        });
    }
}