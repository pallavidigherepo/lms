<?php

namespace App\Imports;

use App\Models\Course;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CourseImport implements ToModel, WithHeadingRow, WithValidation
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $types = explode(',', ltrim(rtrim($row['course_types'],"]"), "["));
        
        $tags = explode(',', ltrim(rtrim($row['tags'],"]"), "["));
        
        $inputs = [
            'course_code' => $row['course_code'],
            'name' => $row['name'],
            'language_id' => $row['language_id'],
            'courses_types' => $types,
            'tags' => $tags,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        $course = Course::create($inputs);
        
        $course->attachTags($tags);
        $course->courses_types()->sync($types);
        return $course;
    }

    public function rules(): array
    {
        return [
            'course_code' => 'required|unique:courses',
            // Above is alias for as it always validates in batches
            '*.course_code' => 'required|unique:courses',

            // Can also use callback validation rules
            'name' => 'required',
            '*.name' => 'required'
        ];
    }
}
