<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => json_encode(Str::random(10)),
            'description' => json_encode(Str::random(20)),
            'board_id' => 1,
            'standard_id' => 1,
            'icon' => Str::random(3),
            'tags' => [Str::random(3), Str::random(2)],
            'language_id' => 1,
        ];
    }
}
