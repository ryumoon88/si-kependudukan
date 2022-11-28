<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

use function PHPUnit\Framework\isNull;

class LocationApi extends Controller
{
    // public function province(Province $province)
    // {
    //     if (!$province->exists)
    //         return json_encode(['data' => $province->all()]);
    //     return json_encode(['data' => $province->cities]);
    // }

    public function city(Province $province)
    {
        return json_encode($province->cities);
    }

    public function district(City $city)
    {
        // dd($city);
        return json_encode($city->districts);
    }

    public function village(District $district)
    {
        return json_encode($district->villages);
    }
}