<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Aspiration extends Model
{
    protected $fillable = [
        'name',
        'identity_number',
        'email',
        'phone',
        'message',
        'source',
    ];
}
