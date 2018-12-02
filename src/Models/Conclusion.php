<?php

namespace ActivismBE\Reportable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphTo};

/**
 * Class Conclusion 
 * 
 * @package BrainFaust\Reportable\Mopdels
 */
class Conclusion extends Model
{
    /**
     * The database table name for the model. 
     * 
     * @return string 
     */
    protected $table = 'reports_conclusions';

    /**
     * The attributes that aren't mass assignable. 
     * 
     * @return array 
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native type. 
     * 
     * @return array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * Get the conclusion for the Report Model
     * 
     * @return BelongsTo
     */
    public function conclusion(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Query builder instance for all the judges that have judged the reported entity. 
     * 
     * @return MorphTo
     */
    public function judge(): MorphTo
    {
        return $this->morphTo();
    }
}
