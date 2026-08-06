<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AidType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class MemberAidRequest extends Model
{
    protected $fillable = [
        'member_id',
        'type',
        'patient_name',
        'patient_identity_number',
        'patient_phone',
        'patient_address',
    ];

    protected $casts = [
        'type' => AidType::class,
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
