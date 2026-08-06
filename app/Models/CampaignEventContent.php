<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class CampaignEventContent extends Model implements HasMedia
{
    use InteractsWithMedia;
    use LogsActivity;

    protected $fillable = [
        'slug',
        'title',
        'date_label',
        'place',
        'short_desc',
        'image_path',
        'lead',
        'sections',
        'cta',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'sections' => 'array',
        'cta' => 'array',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }

    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->format('webp')
            ->quality(75)
            ->queued();

        $this->addMediaConversion('social')
            ->width(1200)
            ->height(630)
            ->format('webp')
            ->quality(80)
            ->queued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
