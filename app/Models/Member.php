<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function aidRequests()
    {
        return $this->hasMany(MemberAidRequest::class);
    }
}

