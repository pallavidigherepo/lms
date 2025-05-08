<?php

namespace Database\Seeders;

use App\Models\FeeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Curriculum Activity',
                'installation_available' => 1,
            ],
            [
                'name' => 'Sports + any activity (Karate/Music/Dance)',
                'installation_available' => 1,
            ],
            [
                'name' => 'Term Fee',
                'installation_available' => 1,
            ],
            [
                'name' => 'Tuition Fee',
                'installation_available' => 1,
            ],
        ];

        foreach ($categories as $category) {
            $input = [
                'name' => $category['name'],
                'installation_available' => $category['installation_available']
            ];
            FeeCategory::create($input);
        }
    }
}
