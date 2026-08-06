<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

final class Event extends Model
{
    use LogsActivity;

    protected $fillable = [
        'event_category_id',
        'title',
        'slug',
        'starts_at',
        'venue_name',
        'address',
        'description',
        'banner_image',
        'status',
        'map_url',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'status' => EventStatus::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('status', EventStatus::Upcoming);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
