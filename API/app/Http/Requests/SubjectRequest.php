<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
                Rule::unique('subjects')->ignore($this->subject)
            ],
            'board_id' => 'required',
            'standard_id' => 'required'
            /*'tags' => [
                'required',
            ],*/
        ];
    }
}
