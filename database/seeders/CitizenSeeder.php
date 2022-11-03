<?php

namespace Database\Seeders;

use App\Models\Citizen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Citizen::create([
            'id_number' => '1370000000000008',
            'first_name' => 'Naufal',
            'last_name' => 'Hady',
            'gender' => 'Male',
            'address' => 'Indonesia',
            'marital_status' => 'Single',
            'religion' => 'Islam',
            'place_of_birth' => 'Indonesia',
            'date_of_birth' => '1900-01-01',
            'blood_type' => 'A'
        ]);
        Citizen::create([
            'id_number' => '1370000000000002',
            'first_name' => 'Jilhan',
            'last_name' => 'Haura',
            'gender' => 'Female',
            'address' => 'Indonesia',
            'marital_status' => 'Single',
            'religion' => 'Islam',
            'place_of_birth' => 'Indonesia',
            'date_of_birth' => '1900-01-02',
            'blood_type' => 'A'
        ]);

        Citizen::factory(1000)->create();
    }
}