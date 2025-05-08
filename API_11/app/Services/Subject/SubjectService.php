<?php
namespace App\Services\Subject;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectService
{

    public function __construct(protected SubjectRepositoryInterface $subjectRepository) { }

    public function all($request)
    {
        return $this->subjectRepository->all($request);
    }


    public function create(SubjectRequest $request)
    {

        return $this->subjectRepository->create($request);
    }

    public function edit($request, $subject)
    {
        return $this->subjectRepository->update($request, $subject);
    }
    public function update(Request $request, $subject)
    {
        return $this->subjectRepository->update($request, $subject);
    }

    public function delete(Subject $subject)
    {
        return $this->subjectRepository->delete($subject);
    }

}
