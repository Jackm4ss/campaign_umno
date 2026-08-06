<?php

declare(strict_types=1);

namespace App\Enums;

enum AidType: string
{
    case KeperluanAsasDapur = 'keperluan_asas_dapur';
    case WangTunai = 'wang_tunai';
    case KatilHospitalKerusiRoda = 'katil_hospital_kerusi_roda';
    case VanJenazahPercuma = 'van_jenazah_percuma';
    case KadKesihatanKunan = 'kad_kesihatan_kunan';

    public function label(): string
    {
        return match ($this) {
            self::KeperluanAsasDapur => 'Keperluan Asas Dapur',
            self::WangTunai => 'Bantuan Wang Tunai',
            self::KatilHospitalKerusiRoda => 'Katil Hospital / Kerusi Roda',
            self::VanJenazahPercuma => 'Van Jenazah Percuma',
            self::KadKesihatanKunan => 'Kad Kesihatan KuNan',
        };
    }
}
