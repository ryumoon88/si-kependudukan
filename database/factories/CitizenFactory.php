<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citizen>
 */
class CitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'][rand(0, 1)];
        $religion = ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Konghucu'][rand(0, 5)];
        $blood_type = ['A', 'B', 'AB', 'O'][rand(0, 3)];
        return [
            'id_number' => fake()->bothify('137000##########'),
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName($gender),
            'gender' => $gender,
            'address' => fake()->address(),
            'religion' => $religion,
            'place_of_birth' => fake()->country(),
            'date_of_birth' => fake()->date('Y-m-d H:i:s'),
            'blood_type' => $blood_type,
        ];
    }
}