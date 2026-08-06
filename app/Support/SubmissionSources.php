<?php

declare(strict_types=1);

namespace App\Support;

final class SubmissionSources
{
    /** @return array<string, string> */
    public static function labels(): array
    {
        return [
            'direct' => 'Direct',
            'facebook' => 'Facebook',
            'google' => 'Google',
            'tiktok' => 'TikTok',
            'instagram' => 'Instagram',
            'youtube' => 'YouTube',
            'whatsapp' => 'WhatsApp',
            'telegram' => 'Telegram',
            'twitter' => 'Twitter',
            'x' => 'X',
            'lain-lain' => 'Lain-lain',
        ];
    }

    /** @return array<string, string> */
    public static function colors(): array
    {
        return [
            'direct' => '#64748b',
            'facebook' => '#1877F2',
            'google' => '#EA4335',
            'tiktok' => '#111111',
            'instagram' => '#E1306C',
            'youtube' => '#FF0000',
            'whatsapp' => '#25D366',
            'telegram' => '#26A5E4',
            'twitter' => '#1DA1F2',
            'x' => '#000000',
            'lain-lain' => '#f59e0b',
        ];
    }

    public static function label(string $key): string
    {
        return self::labels()[$key] ?? $key;
    }
}
