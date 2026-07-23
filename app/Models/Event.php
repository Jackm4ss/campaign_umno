<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }
}

