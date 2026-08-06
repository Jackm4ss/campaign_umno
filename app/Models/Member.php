<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AidStatus;
use App\Enums\IdentityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class Member extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'photo_path',
        'full_name',
        'identity_number',
        'identity_type',
        'birth_date',
        'phone',
        'email',
        'address',
        'presint',
        'state',
        'voter_proof_path',
        'aid_status',
        'aid_proof_path',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'identity_type' => IdentityType::class,
        'aid_status' => AidStatus::class,
    ];

    public function aidRequests(): HasMany
    {
        return $this->hasMany(MemberAidRequest::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);

        $this->addMediaCollection('voter_proof')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'application/pdf']);
    }
}
