<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class EventRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'identity_number',
        'email',
        'qr_token',
        'checked_in_at',
    ];

    protected $casts = [
        'checked_in_at' => 'datetime',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
