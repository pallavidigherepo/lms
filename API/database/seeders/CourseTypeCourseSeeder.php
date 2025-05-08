<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoursesType;
use App\Models\Course;

class CourseTypeCourseSeeder extends Seeder
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
                'courses' => [
                    [
                        'name' => 'CBSE',
                        'course_code' => 'cbse',
                        'created_by' => 1,
                        'updated_by' => 1,
                        'language_id' => 1,
                        'tags' => ['cbse']
                    ],
                ]
            ],
            [
                'label' => json_encode('Crash Course'),
                'description' => json_encode('Crash Course'),
                'courses' => [                    
                    [
                        'name' => 'Banking',
                        'course_code' => 'bking',
                        'created_by' => 1,
                        'updated_by' => 1,
                        'language_id' => 1,
                        'type_ids' => ["3"],
                        'tags' => ['banking']
                    ],
                ]
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
