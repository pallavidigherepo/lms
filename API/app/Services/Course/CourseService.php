<?php
namespace App\Services\Course;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseService
{

    public function __construct(protected CourseRepositoryInterface $courseRepository) 
    {}

    public function all($request)
    {
        return $this->courseRepository->all($request);
    }

    public function create(CourseRequest $request)
    {

        return $this->courseRepository->create($request);
    }

    public function update(Request $request, $course)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->courseRepository->update($request, $course);
    }


    public function delete(Course $course)
    {
        return $this->courseRepository->delete($course);
    }

}
