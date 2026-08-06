<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\GalleryType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class GalleryItem extends Model implements HasMedia
{
    use InteractsWithMedia;
    use LogsActivity;

    protected $fillable = [
        'title',
        'type',
        'image_path',
        'external_url',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer',
        'type' => GalleryType::class,
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
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

        $this->addMediaConversion('full')
            ->width(1200)
            ->format('webp')
            ->quality(80)
            ->queued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
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
