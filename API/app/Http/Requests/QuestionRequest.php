<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            /*'question' => [
                'required',
            ],
            'description' => [
                'required',
            ],*/
            'board_id' => [
                'required',
            ],
            'standard_id' => [
                'required',
            ],
            /*'note' => [
                'required',
            ],*/
            'difficulty_level_id' => [
                'required',
            ],
            'type_id' => [
                'required',
            ],
            'language_id' => [
                'required',
            ],
            'subject_id' => [
                'required',
            ],
            'chapter_id' => [
                'required',
            ],
            // 'topic_id' => [
            //     'required',
            // ],
        ];
    }
}
