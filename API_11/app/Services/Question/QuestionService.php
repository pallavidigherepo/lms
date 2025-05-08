<?php
namespace App\Services\Question;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionService
{

    public function __construct(protected QuestionRepositoryInterface $questionRepository) { }

    public function all($request)
    {
        return $this->questionRepository->all($request);
    }


    public function create($request)
    {

        return $this->questionRepository->create($request);
    }

    public function show(Question $question): mixed
    {
        if (!$question) {
            return false;
        }
        return $this->questionRepository->show($question);
    }

    public function update(Request $request, $question)
    {
        return $this->questionRepository->update($request, $question);
    }


    public function delete(Question $question)
    {
        return $this->questionRepository->delete($question);
    }

    private function __importQuestionInBulk($request): array
    {
        return $this->questionService->__importQuestionInBulk($request);
    }

    private function __createAndUpdateQuestion(Array $inputArray, Question $parentQuestion = null)
    {
        return $this->questionService->__createAndUpdateQuestion($inputArray, $parentQuestion);
    }


    private function __createAndUpdateAnswer(Array $answers, Question $question)
    {
        return $this->questionService->__createAndUpdateAnswer($answers, $question);
    }

    private function __createAnswer($data, $question)
    {
        return $this->questionService->__createAnswer($data, $question);
    }

    private function __updateAnswer(Answer $answer, $data)
    {
        return $this->questionService->__updateAnswer($answer, $data);
    }

    private function __fetchQuestionForPaperGeneration()
    {

    }
}
