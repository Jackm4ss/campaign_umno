<?php

declare(strict_types=1);

namespace App\Support;

final class ProgramContent
{
    /**
     * @return array{primary: array{label: string, href: string}, secondary: array{label: string, href: string}}
     */
    public static function defaultCta(): array
    {
        return [
            'primary' => [
                'label' => 'Hantar Aspirasi',
                'href' => 'sertai',
            ],
            'secondary' => [
                'label' => 'Lihat semua program',
                'href' => 'program-list',
            ],
        ];
    }
}
