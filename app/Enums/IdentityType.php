<?php

declare(strict_types=1);

namespace App\Enums;

enum IdentityType: string
{
    case MyKad = 'MyKad';
    case MyTentera = 'MyTentera';
    case MyPolis = 'MyPolis';
}
