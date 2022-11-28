<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resident::factory()->create([
            'birth_id' => 1,
            'id_number' => '1370000000000008',
            'blood_type' => 'A',
            'religion' => 'Islam',
            'email' => 'naufalhady@mail.com',
            'address' => 'Padang, Indonesia',
            'phone_number' => '0812345678910'
        ]);
        Resident::factory()->create([
            'birth_id' => 2,
            'id_number' => '1370000000000002',
            'blood_type' => 'A',
            'religion' => 'Islam',
            'email' => 'jilhanhaura@mail.com',
            'address' => 'Padang, Indonesia',
            'phone_number' => '0812345672210'
        ]);

        for ($i = 3; $i <= 1000; $i++) {
            Resident::factory()->create([
                'birth_id' => $i
            ]);
        }
    }
}