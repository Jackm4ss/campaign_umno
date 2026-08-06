<?php

declare(strict_types=1);

namespace App\Enums;

enum AidStatus: string
{
    case Diterima = 'diterima';
    case SedangDirancang = 'sedang_dirancang';
    case Selesai = 'selesai';
    case BelumAdaTindakan = 'belum_ada_tindakan';

    public function label(): string
    {
        return match ($this) {
            self::Diterima => 'Diterima',
            self::SedangDirancang => 'Sedang Dirancang',
            self::Selesai => 'Selesai',
            self::BelumAdaTindakan => 'Belum Ada Tindakan',
        };
    }
}
