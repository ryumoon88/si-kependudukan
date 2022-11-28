<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_number' => fake()->bothify('137000##########'),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'blood_type' => ['A', 'B', 'AB', 'O'][rand(0, 3)],
            'religion' => ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Khonghucu'][rand(0, 5)],
            'profession' => fake()->jobTitle(),
            'address' => fake()->address(),
            'ulid' => Str::lower(Ulid::generate(now()))
        ];
    }
}