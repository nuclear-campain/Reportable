<?php

declare(strict_types=1);

namespace BrianFaust\Reportable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, MorphTo};

/**
 * Class Report 
 * 
 * @package BrianFaust\Reportable\Models
 */
class Report extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * Data relation for accessing the entity information that report something.
     * 
     * @return MorphTo
     */
    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Data relation for getting the information from the report conclusion. 
     * 
     * @return HasOne
     */
    public function conclusion(): HasOne
    {
        return $this->hasOne(Conclusion::class);
    }

    /**
     * Get the judge for the Report Model (only available if there is a conclusion)
     * 
     * @return Model
     */
    public function judge(): Model
    {
        return $this->conclusion->judge;
    }

    /**
     * Method to create a conclusion for the report. 
     * 
     * @param  array $data  The data from the form in the application. 
     * @param  Model $judge The entity from the person that judged the item. 
     * @return Conclusion
     */
    public function conclude(array $data, Model $judge): Conclusion
    {
        $conclusion = (new Conclusion())->fill(array_merge($data, [
            'judge_id'   => $judge->id,
            'judge_type' => get_class($judge),
        ]));

        $this->conclusion()->save($conclusion);

        return $conclusion;
    }

    /**
     * Eloquent method for getting all the users that judged the item. 
     * 
     * @return array
     */
    public static function allJudges(): array
    {
        $judges = [];

        foreach (Conclusion::get() as $conclusion) {
            $judges[] = $conclusion->judge;
        }

        return $judges;
    }
}
