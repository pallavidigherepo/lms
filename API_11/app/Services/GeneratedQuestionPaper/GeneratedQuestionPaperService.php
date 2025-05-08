<?php
namespace App\Services\GeneratedQuestionPaper;

use App\Http\Requests\GeneratedQuestionPaperRequest;
use App\Models\GeneratedQuestionPaper;
use App\Repositories\Interfaces\GeneratedQuestionPaperRepositoryInterface;
use Illuminate\Http\Request;

class GeneratedQuestionPaperService
{

    public function __construct(protected GeneratedQuestionPaperRepositoryInterface $generatedQuestionPaperRepository) { }

    public function all($request)
    {
        return $this->generatedQuestionPaperRepository->all($request);
    }


    public function create(GeneratedQuestionPaperRequest $request)
    {

        return $this->generatedQuestionPaperRepository->create($request);
    }

    public function update(Request $request, $generatedQuestionPaper)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->generatedQuestionPaperRepository->update($request, $generatedQuestionPaper);
    }


    public function delete(GeneratedQuestionPaper $generatedQuestionPaper)
    {
        return $this->generatedQuestionPaperRepository->delete($generatedQuestionPaper);
    }

}
