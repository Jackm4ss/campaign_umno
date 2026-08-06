<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class Article extends Model implements HasMedia
{
    use InteractsWithMedia;
    use LogsActivity;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'thumbnail_path',
        'category',
        'content',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => ArticleStatus::class,
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::Published);
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
        $this->addMediaCollection('thumbnail')
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
