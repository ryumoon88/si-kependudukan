<?php

namespace Database\Seeders;

use App\Models\ResidentBirth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentBirthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentBirth::factory()->create([
            'father_id' => null,
            'mother_id' => null,
            'name' => 'Naufal Hady',
            'birth_date' => '1999-01-01',
            'birth_place' => 'Indonesia',
            'gender' => 'Male'
        ]);
        ResidentBirth::factory()->create([
            'father_id' => null,
            'mother_id' => null,
            'name' => 'Tsalsabilla Jilhan Haura',
            'birth_date' => '1999-01-01',
            'birth_place' => 'Indonesia',
            'gender' => 'Female'
        ]);

        for ($i = 3; $i <= 1000; $i++) {
            $gender = ['Male', 'Female'][rand(0, 1)];
            ResidentBirth::factory()->create([
                'father_id' => fake()->numberBetween(3, 1000),
                'mother_id' => fake()->numberBetween(3, 1000),
                'name' => fake()->name($gender),
                'gender' => $gender
            ]);
        }
    }
}