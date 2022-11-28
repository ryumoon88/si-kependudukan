<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class Resident extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function birth()
    {
        return $this->belongsTo(ResidentBirth::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class)->withDefault(['name' => '-']);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault(['name' => '-']);
    }

    public function district()
    {
        return $this->belongsTo(District::class)->withDefault(['name' => '-']);
    }

    public function village()
    {
        return $this->belongsTo(Village::class)->withDefault(['name' => '-']);
    }
}