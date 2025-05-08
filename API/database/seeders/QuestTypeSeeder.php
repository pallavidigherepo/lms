<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionType;

class QuestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Single choice',
                'in_paragraph' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Multiple choice',
                'in_paragraph' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Fill in the blanks',
                'in_paragraph' => true,
                'is_active' => true,
            ],
            [
                'name' => 'True or false',
                'in_paragraph' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Paragraph',
                'in_paragraph' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Subjective',
                'in_paragraph' => true,
                'is_active' => true,
            ],
            //['name' => 'Single scentence'],
            //['name' => 'Muliple scentence'],
            //['name' => 'Essay'],
            //['name' => 'Brief answer'],
            //['name' => 'Concept'],
            //['name' => 'Theorum'],
            [
                'name' => 'Miscellaneous',
                'in_paragraph' => false,
                'is_active' => false,
            ],
            //['name' => 'Match the pair'],
            [
                'name' => 'Audio',
                'in_paragraph' => false,
                'is_active' => false,
            ],
            [
                'name' => 'Image',
                'in_paragraph' => false,
                'is_active' => false,
            ],
            [
                'name' => 'Video',
                'in_paragraph' => false,
                'is_active' => false,
            ],
        ];

        foreach ($types as $type) {
            $input = [
                'name' => json_encode($type['name']),
                'in_paragraph' => $type['in_paragraph'],
                'is_active' => $type['is_active']
            ];
            QuestionType::create($input);
        }
    }
}
