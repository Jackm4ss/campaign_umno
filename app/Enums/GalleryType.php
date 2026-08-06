<?php

declare(strict_types=1);

namespace App\Enums;

enum GalleryType: string
{
    case Photo = 'photo';
    case Youtube = 'youtube';
    case Tiktok = 'tiktok';
    case Instagram = 'instagram';
    case Facebook = 'facebook';

    public function label(): string
    {
        return match ($this) {
            self::Photo => 'Foto',
            self::Youtube => 'YouTube',
            self::Tiktok => 'TikTok',
            self::Instagram => 'Instagram',
            self::Facebook => 'Facebook',
        };
    }
}
