<?php

namespace ActivismBE\Reportable\Traits;

use ActivismBE\Reportable\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait HasReports 
 * 
 * @package BrainFaust\Reportable\Traits
 */
trait HasReports
{
    /**
     * Method for getting a query builder instance for all the reports that are attached to the entity.
     * 
     * @return MorphMany
     */
    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * Create a report for the given entity
     * 
     * @param  array $data       The inputs from the form in the application.
     * @param  Model $reportable The data entity from the item u want to report.
     * @return Report
     */
    public function report(array $data, Model $reportable): Report
    {
        $report = (new Report())->fill(array_merge($data, [
            'reporter_id'   => $reportable->id,
            'reporter_type' => get_class($reportable),
        ]));

        $this->reports()->save($report);

        return $report;
    }
}
