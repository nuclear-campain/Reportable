<?php

declare(strict_types=1);

namespace BrianFaust\Reportable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Conclusion extends Model
{
    protected $table = 'reports_conclusions';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function conclusion(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function judge(): MorphTo
    {
        return $this->morphTo();
    }
}
