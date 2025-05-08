<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionDifficultyLevel;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            ['name' => 'Easy'],
            ['name' => 'Beginner'],
            ['name' => 'Intermediate'],
            ['name' => 'Difficult'],
        ];

        foreach ($levels as $level) {
            $input = [
                'name' => json_encode($level['name'])
            ];
            QuestionDifficultyLevel::create($input);
        }
    }
}
