<?php namespace Sukohi\ClockLabel;

use Illuminate\Support\ServiceProvider;

class ClockLabelServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var  bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['clock-label'] = $this->app->share(function($app)
        {
            return new ClockLabel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['clock-label'];
    }

}