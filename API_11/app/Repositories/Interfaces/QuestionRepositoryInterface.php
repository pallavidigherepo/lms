<?php
namespace App\Repositories\Interfaces;

Interface QuestionRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $question);

    public function delete($question);

    public function __importQuestionInBulk($data): array;

    public function __createAndUpdateQuestion(array $inputArray, \App\Models\Question $parentQuestion = null);

    public function __createAndUpdateAnswer(array $answers, \App\Models\Question $question);

    public function __createAnswer(array $data);

    public function __updateAnswer(array $data, \App\Models\Answer $answer);

    public function  __fetchQuestionForPaperGeneration();

}