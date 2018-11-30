<?php

declare(strict_types=1);

namespace BrianFaust\Reportable;

use Illuminate\Support\ServiceProvider;

class ReportableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
