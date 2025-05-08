<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Imports\QuestionImport;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Services\Question\QuestionService;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Standard;
use App\Models\Language;
use App\Models\QuestionDifficultyLevel;
use App\Models\QuestionType;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Answer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

/**
 *
 */
class QuestionController extends Controller
{
    public function __construct(protected QuestionService $questionService)
    {}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->questionService->all($request);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return Response
     */
    public function store(QuestionRequest $request)
    {
        $question = $this->questionService->create($request);
        if (!$question) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Registered Successfully', 'data' => $question], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Request $request)
    {
        return QuestionResource::make(Question::findOrFail($question->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\QuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question = $this->questionService->create($request);
        if (!$question) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Registered Successfully', 'data' => $question], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        // First of all delete all the answers and then delete question.
        $question->answers()->delete();
        if ($question->delete()) {
            $response = [
                'success' => true,
                'message' => 'Question deleted successfully.',
            ];
        }
        return response()->json($response);
    }


    /**
     * @param $request
     * @return array
     */
    private function __importQuestionInBulk($request): array
    {
        return $this->questionService->__importQuestionInBulk($request, Auth::user()->id);
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
