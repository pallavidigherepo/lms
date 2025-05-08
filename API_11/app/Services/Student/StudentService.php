<?php
namespace App\Services\Student;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentService
{

    public function __construct(protected StudentRepositoryInterface $studentRepository) { }

    public function all($request)
    {
        return $this->studentRepository->all($request);
    }


    public function create(StoreStudentRequest $request)
    {

        return $this->studentRepository->create($request);
    }

    public function update(Request $request, $student)
    {
        return $this->studentRepository->update($request, $student);
    }


    public function delete(Student $student)
    {
        return $this->studentRepository->delete($student);
    }

}
