<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use phpDocumentor\Reflection\Types\Mixed_;

class QuestionImport implements ToModel, WithHeadingRow, WithValidation
{
    protected $board_id;
    protected $standard_id;
    protected $difficulty_level_id;
    protected $type_id;
    protected $language_id;
    protected $subject_id;
    protected $chapter_id;
    protected $topic_id;

    public function __construct($query)
    {
        $this->board_id = $query->board_id;
        $this->standard_id = $query->standard_id;
        $this->difficulty_level_id = $query->difficulty_level_id;
        $this->type_id = $query->type_id;
        $this->language_id = $query->language_id;
        $this->subject_id = $query->subject_id;
        $this->chapter_id = $query->chapter_id;
        $this->topic_id = $query->topic_id;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $inputArray = [
            'board_id' => $this->board_id,
            'standard_id' => $this->standard_id,
            'difficulty_level_id' => $this->difficulty_level_id,
            'type_id' => $this->type_id,
            'language_id' => $this->language_id,
            'subject_id' => $this->subject_id,
            'chapter_id' => $this->chapter_id,
            'topic_id' => $this->topic_id,
            'question' => $row['question'],
            'description' => $row['description'],
            'note' => $row['note'],
            'marks' => $row['marks'],
            'negative_marks' => $row['negative_marks'],
            'expected_time' => $row['expected_time'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        $question = Question::create($inputArray);

        if ($this->type_id != 6) {
            if ($question) {
                $answerArray = [
                    'answer' => $row['option_1'],
                    'question_id' => $question->id,
                    'is_correct' => $row['correct_answers'] === 1,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ];
                Answer::create($answerArray);
                unset($answerArray);
                $answerArray = [
                    'answer' => $row['option_2'],
                    'question_id' => $question->id,
                    'is_correct' => $row['correct_answers'] === 2,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ];
                Answer::create($answerArray);
                unset($answerArray);
                $answerArray = [
                    'answer' => $row['option_3'],
                    'question_id' => $question->id,
                    'is_correct' => $row['correct_answers'] === 3,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ];
                Answer::create($answerArray);
                unset($answerArray);

                $answerArray = [
                    'answer' => $row['option_4'],
                    'question_id' => $question->id,
                    'is_correct' => $row['correct_answers'] === 4,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ];
                Answer::create($answerArray);
                unset($answerArray);
            }
        }


    }

    public function rules(): array
    {
        return [
            'question' => 'required',
            '*.question' => 'required',
            'description' => 'required',
            '*.description' => 'required',
            'note' => 'required',
            '*.note' => 'required',
            'marks' => 'required',
            '*.marks' => 'required',
            'negative_marks' => 'required',
            '*.negative_marks' => 'required',
            'expected_time' => 'required',
            '*.expected_time' => 'required',
        ];
    }
}
