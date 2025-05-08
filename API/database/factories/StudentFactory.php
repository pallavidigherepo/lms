<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => Str::random(10),
            'aadhaar' => Str::random(12),
            //'icon' => Str::random(5),
            'tags' => ['tag1', 'tag2'],
            'language' => 'English'
        ];
    }
}
