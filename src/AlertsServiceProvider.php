<?php

namespace Apnem19\Alerts;

use Illuminate\Support\ServiceProvider;

class AlertsServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind(
            'Apnem19\Alerts\SessionStore',
            'Apnem19\Alerts\LaravelSessionStore'
        );

        $this->app->singleton('alert', function () {
            return $this->app->make('Apnem19\Alerts\AlertsNotifier');
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'alerts');

        $this->publishViews();
        $this->publishComponents();
    }

    protected function publishViews()
    {
        $this->publishes([__DIR__ . '/resources/views' => base_path('resources/views/vendor/alerts')], 'views');
    }

    protected function publishComponents()
    {
        $this->publishes([ __DIR__ . '/resources/assets/js' => base_path('resources/assets/js/vendor/alerts')], 'components');
    }
}