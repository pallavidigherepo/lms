<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'label' => [
                'required',
                Rule::unique('subjects')->ignore($this->chapter)
            ],
            'parent_id' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
