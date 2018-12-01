<?php

namespace BrianFaust\Reportable;

use Illuminate\Support\ServiceProvider;

/**
 * Class ReportableServiceProvider 
 * 
 * @package BrainFaust\Reportable
 */
class ReportableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * 
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
