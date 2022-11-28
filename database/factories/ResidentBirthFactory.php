<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResidentBirth>
 */
class ResidentBirthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ulid' => Str::lower(Ulid::generate(now())),
            'birth_date' => fake()->dateTimeBetween(),
            'birth_place' => fake()->address()
        ];
    }
}