<?php

declare(strict_types=1);

namespace BrianFaust\Tests\Reportable;

use BrianFaust\Reportable\ReportableServiceProvider;
use Illuminate\Interfaces\Foundation\Application;
use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param  Application  $app
     * @return string
     */
    protected function getServiceProviderClass(Application $app): string
    {
        return ReportableServiceProvider::class;
    }
}
