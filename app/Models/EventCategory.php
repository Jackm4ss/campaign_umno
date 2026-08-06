<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class EventCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'event_category_id');
    }
}
