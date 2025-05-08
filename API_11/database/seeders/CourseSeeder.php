<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name' => 'CBSE',
                'course_code' => 'cbse',
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 1,
                'type_ids' => ["1", "2"],
                'tags' => ['cbse']
            ],
            [
                'name' => 'Banking',
                'course_code' => 'bking',
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 1,
                'type_ids' => ["3"],
                'tags' => ['banking']
            ],
        ];
        foreach($courses as $course)
        {
            $input = [
                'name' => $course['name'],
                'course_code' => $course['course_code'],
                'language_id' => $course['language_id'],
                'created_by' => $course['created_by'],
                'updated_by' => $course['updated_by']
            ];
            $courseCreated = Course::create($input);
            $courseCreated->attachTags($course['tags']);
            $courseCreated->courses_types()->sync($course['type_ids']);
        }
    }
}
