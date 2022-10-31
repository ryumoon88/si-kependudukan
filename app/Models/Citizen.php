<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}