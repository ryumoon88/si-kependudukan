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
            'address' => 'Komp. Filano Jaya II Blok GG 4 No.1',
            'phone_number' => '0895602736337',
            'marital_status' => 'Single',
            'religion' => 'Islam',
            'place_of_birth' => 'Padang',
            'date_of_birth' => '2003-01-01',
            'blood_type' => 'A'
        ]);

        Citizen::factory(100)->create();
    }
}
