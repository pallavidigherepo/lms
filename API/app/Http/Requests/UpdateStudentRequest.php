<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            /*'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($this->student)
            ],
            'aadhaar' => [
                'required',
                Rule::unique('students')->ignore($this->student)
            ],*/
        ];
    }
}
