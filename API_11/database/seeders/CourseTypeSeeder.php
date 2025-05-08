<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoursesType;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseTypes = [
            [
                'label' => json_encode('Complete Course'),
                'description' => json_encode('Complete Course'),
            ],
            [
                'label' => json_encode('Crash Course'),
                'description' => json_encode('Crash Course'),
            ],
            [
                'label' => json_encode('Half Yearly'),
                'description' => json_encode('Half yearly course'),
            ]
        ];

        foreach ($courseTypes as $courseType) {
            CoursesType::create($courseType);
        }
    }
}
