<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentBirth extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'birth_date' => 'date:d M Y'
    ];

    protected $hidden = ['father_id', 'mother_id'];

    public function father()
    {
        return $this->belongsTo(Resident::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(Resident::class, 'mother_id');
    }
}