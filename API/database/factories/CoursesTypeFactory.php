<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoursesTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => json_encode($this->faker->name()),
            'description' => json_encode($this->faker->name()),
            'icon' => Str::random(3)
        ];
    }
}
