<?php
namespace App\Repositories;

use App\Models\Role;
use App\Imports\QuestionImport;
use App\Models\Question;
use App\Http\Resources\QuestionResource;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Http\Requests\QuestionRequest;
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

class QuestionRepository implements QuestionRepositoryInterface
{
    public function all($request)
    {
        if (isset($request->paper_generation) && $request->paper_generation) {
            return QuestionResource::collection(
                Question::when(request('paper_generation'), function ($query) {
                    $query->where('board_id', request('board_id'));
                    $query->where('standard_id', request('standard_id'));
                    $query->where('subject_id', request('subject_id'));
                    if (request('difficulty_level_id') != null) {
                        $query->where('difficulty_level_id', request('difficulty_level_id'));
                    }
                    if (request('chapter_id') != null) {
                        $query->where('chapter_id', request('chapter_id'));
                    }
                    if (request('topic_id') !=null ) {
                        $query->where('topic_id', request('topic_id'));
                    }
                    if (request('type_id') !=null) {
                        $query->where('type_id', request('type_id'));
                    }
                })
                    ->whereNull('parent_id')
                    //->orderBy($field, $order)
                    ->inRandomOrder()
                    ->paginate(10)
            );
        } else {
            $field = $request->input('sort_field') ?? 'id';
            $order = $request->input('sort_order') ?? 'desc';
            $perPage = $request->input('per_page') ?? 10;

            return QuestionResource::collection(
                Question::when(request('search'), function ($query) {
                    $query->where('question', 'like', '%'. request('search'). '%');
                })
                    ->whereNull('parent_id')
                    ->orderBy($field, $order)
                    ->paginate($perPage)
            );
        }
    }

    public function create($request)
    {
        if (!$request->add_question_manually) {
            // We are here because we are doing bulk imports.
            $response = $this->__importQuestionInBulk($request);
        } else {
            // First most: Validate all the request data.
            if ($request->validated()) {
                $parentQuestion = $this->__createAndUpdateQuestion($request->toArray());
                // When question is created we need to check if the added question has $request['questions']
                // If yes then we have save all the questions and appropriate answers.
                if (isset($request['questions']) && !empty($request['questions'])) {
                    $questions = $request['questions'];

                    foreach ($questions as $question) {
                        $pQuestion = $this->__createAndUpdateQuestion($question, $parentQuestion);
                        // After question is saved/created successfully, we need to add
                        // answers of that created question.
                        $this->__createAndUpdateAnswer($question['answers'], $pQuestion);
                    }
                } else {
                    // After question is saved/created successfully, we need to add
                    // answers of that created question.
                    $this->__createAndUpdateAnswer($request['answers'], $parentQuestion);
                }
                $response = [
                    'success' => true,
                    'message' => 'Successfully added',
                    'question' => $request,
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to add'
                ];
            }
        }

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $question = Question::with('questions.answers',
                                    'questions',
                                    'answers',
                                    'board',
                                    'standard',
                                    'languages',
                                    'question_type',
                                    'difficulty_level',
                                    'subject',
                                    'chapter',
                                    'topic',
                                    'creator',
                                    'updator')
                                ->find($question->id);
            return response()->json($question, 200);
    }

    public function update($request, $question)
    {
        if ($request->validated()) {
            $parentQuestion = $this->__createAndUpdateQuestion($request->toArray());

            // When question is created we need to check if the added question has $request['questions']
            // If yes then we have save all the questions and approriate answers.
            if (!empty($request['questions'])) {
                $questions = $request['questions'];
                // Get ids as plain array of existing questions
                $existingIds = $question->questions()->pluck('id')->toArray();
                // Get ids as plain array of new questions
                $newIds = Arr::pluck($questions, 'id');
                // Find questions to delete
                $toDelete = array_diff($existingIds, $newIds);
                //Find questions to add
                $toAdd = array_diff($newIds, $existingIds);

                // Delete answers by $toDelete array
                if (!empty($toDelete)) {
                    foreach ($toDelete as $id) {
                        $toDeleteQuestion = Question::find($id);
                        $toDeleteQuestion->answers()->delete();
                        $toDeleteQuestion->delete();
                    }
                }

                foreach ($questions as $question) {
                    if (in_array($question['id'], $toAdd)) {
                        $pQuestion = $this->__createAndUpdateQuestion($question, $parentQuestion);
                        // After question is saved/created successfully, we need to add
                        // answers of that created question.
                        $this->__createAndUpdateAnswer($question['answers'], $pQuestion);
                    }
                }
            } else {
                // After question is saved/created successfully, we need to add
                // answers of that created question.
                $this->__createAndUpdateAnswer($request['answers'], $parentQuestion);
            }
            $response = [
                'success' => true,
                'message' => 'Successfully added'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to add'
            ];
        }

        return response()->json($response, 200);
    }

    public function delete($question)
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

    public function __importQuestionInBulk($request): array
    {   
        try {
            $file = $request->file('import')->store('import');
            $importClass = "App\\Imports\\QuestionImport";
            $import = new $importClass($request);

            Excel::import($import, $file);
            $response = [
                'success' => true,
                'message' => 'All the questions are successfully imported.',
                'failures' => null,
            ];
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $response = [
                'success' => false,
                'message' => 'Question(s) are not imported.',
                'failures' => $failures,
            ];
        }
        return $response;
    }
        


    public function __createAndUpdateQuestion(Array $inputArray, Question $parentQuestion = null)
    {
        $id = null;
        if (isset($inputArray['id'])) {
            $alreadyAQuestion = Question::find($inputArray['id']);
            if ($alreadyAQuestion != null) {
                $id = $alreadyAQuestion->id != null ? $alreadyAQuestion->id: null;
            }
        }

        $inputQuestionData = [
            "id" => $id,
            'parent_id' => $parentQuestion ? $parentQuestion->id: NULL,
            'question' => $inputArray['question'],
            'description' => $inputArray['description'],
            'note' => $inputArray['note'],
            "type_id" => $inputArray['type_id'],
            'board_id' => $parentQuestion ? $parentQuestion->board_id: $inputArray['board_id'],
            "standard_id" => $parentQuestion ? $parentQuestion->standard_id: $inputArray['standard_id'],
            "difficulty_level_id" => $parentQuestion ? $parentQuestion->difficulty_level_id: $inputArray['difficulty_level_id'],
            "subject_id" => $parentQuestion ? $parentQuestion->subject_id: $inputArray['subject_id'],
            "chapter_id" => $parentQuestion ? $parentQuestion->chapter_id: $inputArray['chapter_id'],
            "topic_id" => $parentQuestion ? $parentQuestion->topic_id: $inputArray['topic_id'],
            "language_id" => $parentQuestion ? $parentQuestion->language_id: $inputArray['language_id'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
            "marks" => $inputArray['marks'],
            "negative_marks" => $inputArray['negative_marks'],
        ];
        if ($id) {
            if ($alreadyAQuestion->update($inputQuestionData)) {
                return $alreadyAQuestion;
            }
            return ;
        } else {
            return Question::create($inputQuestionData);
        }
    }

    public function __createAndUpdateAnswer(Array $answers, Question $question)
    {
        if (!empty($answers)) {
            // Get ids as plain array of existing answers
            $existingIds = $question->answers()->pluck('id')->toArray();
            // Get ids as plain array of new answers
            $newIds = Arr::pluck($answers, 'id');
            // Find answers to delete
            $toDelete = array_diff($existingIds, $newIds);
            //Find answers to add
            $toAdd = array_diff($newIds, $existingIds);

            // Delete answers by $toDelete array
            Answer::destroy(collect($toDelete));
            // Create new answers
            foreach ($answers as $answer) {
                if (isset($answer['id']) && in_array($answer['id'], $toAdd)) {
                    if ($answer['is_correct'] == "on" || $answer['is_correct'] == 1) {
                        $isCorrect = 1;
                    } else {
                        $isCorrect = 0;
                    }
                    $answer['is_correct'] = $isCorrect;
                    $answer['question_id'] = $question->id;
                    $answer['created_by'] = Auth::user()->id;
                    $answer['updated_by'] = Auth::user()->id;
                    $this->__createAnswer($answer, $question);
                }
            }

            // Update existing answers
            $answerMap = collect($answers)->keyBy('id');
            foreach ($question->answers as $answer) {
                if (isset($answerMap[$answer->id])) {
                    if ($answer['is_correct'] == "on" || $answer['is_correct'] == 1) {
                        $isCorrect = 1;
                    } else {
                        $isCorrect = 0;
                    }
                    $answer['is_correct'] = $isCorrect;
                    $answer['updated_by'] = Auth::user()->id;
                    //$answer['question_id'] = $question->id;
                    $this->__updateAnswer($answer, $answerMap[$answer->id]);
                }
            }
        }
    }

    public function __createAnswer($data)
    {
        $validator = Validator::make($data, [
            'answer' => 'required|string',
            'question_id' => 'exists:App\Models\Question,id',
            'created_by' => 'exists:App\Models\User,id',
            'updated_by' => 'exists:App\Models\User,id',
            'is_correct' => 'required',
        ]);
        return Answer::create($validator->validated());
    }

    public function __updateAnswer($answer, $data)
    {
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\Answer,id',
            'answer' => 'required|string',
            'updated_by' => 'exists:App\Models\User,id',
            'is_correct' => 'required',
        ]);

        return $answer->update($validator->validated());
    }

    public function  __fetchQuestionForPaperGeneration()
    {

    }
}
