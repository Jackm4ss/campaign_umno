<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AidStatus: string implements HasLabel
{
    case Diterima = 'diterima';
    case SedangDirancang = 'sedang_dirancang';
    case Selesai = 'selesai';
    case BelumAdaTindakan = 'belum_ada_tindakan';

    public function getLabel(): string
    {
        return match ($this) {
            self::Diterima => 'Diterima',
            self::SedangDirancang => 'Sedang Dirancang',
            self::Selesai => 'Selesai',
            self::BelumAdaTindakan => 'Belum Ada Tindakan',
        };
    }

    public function label(): string
    {
        return $this->getLabel();
    }
}
