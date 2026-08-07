<?php

declare(strict_types=1);

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

final class Login extends BaseLogin
{
    protected static string $view = 'filament.pages.auth.login';
}
