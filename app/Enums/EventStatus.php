<?php

declare(strict_types=1);

namespace App\Enums;

enum EventStatus: string
{
    case Ongoing = 'ongoing';
    case Upcoming = 'upcoming';
    case Past = 'past';

    public function label(): string
    {
        return match ($this) {
            self::Ongoing => 'Sedang Berlangsung',
            self::Upcoming => 'Akan Datang',
            self::Past => 'Selepas',
        };
    }
}
