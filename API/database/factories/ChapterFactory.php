<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stubject' => 'English',
            'label' => $this->faker->name(),
            'description' => Str::random(10),
            'icon' => Str::random(5),
            'tags' => ['tag1', 'tag2'],
            'language' => 'English'
        ];
    }
}
