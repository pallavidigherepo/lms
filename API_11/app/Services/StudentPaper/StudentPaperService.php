<?php
namespace App\Services\StudentPaper;

use App\Http\Requests\StoreStudentPaperRequest;
use App\Http\Requests\UpdateStudentPaperRequest;
use App\Models\StudentPaper;
use App\Repositories\Interfaces\StudentPaperRepositoryInterface;
use Illuminate\Http\Request;

class StudentPaperService
{

    public function __construct(protected StudentPaperRepositoryInterface $studentPaperRepository) { }

    public function all($request)
    {
        return $this->studentPaperRepository->all($request);
    }


    public function create(StoreStudentPaperRequest $request)
    {

        return $this->studentPaperRepository->create($request);
    }

    public function update(Request $request, $studentPaper)
    {
        return $this->studentPaperRepository->update($request, $studentPaper);
    }


    public function delete(StudentPaper $studentPaper)
    {
        return $this->studentPaperRepository->delete($studentPaper);
    }

}
