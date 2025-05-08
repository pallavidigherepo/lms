<?php
namespace App\Services\CourseType;

use App\Http\Requests\CoursesTypeRequest;
use App\Models\CoursesType;
use App\Repositories\Interfaces\CourseTypeRepositoryInterface;
use Illuminate\Http\Request;

class CourseTypeService
{

    public function __construct(protected CourseTypeRepositoryInterface $courseTypeRepository) 
    {}

    public function all($request)
    {
        return $this->courseTypeRepository->all($request);
    }

    public function create(CoursesTypeRequest $request)
    {

        return $this->courseTypeRepository->create($request);
    }

    public function update(Request $request, $coursesType)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->courseTypeRepository->update($request, $coursesType);
    }


    public function delete(CoursesType $coursesType)
    {
        return $this->courseTypeRepository->delete($coursesType);
    }

    public function list()
    {
        return $this->coursesTypeRepository->list();
    }

}
