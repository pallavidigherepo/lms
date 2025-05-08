<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'board_id' => 'required',
            'standard_id' => 'required',
            'total_marks' => 'required',
            'duration' => 'required',
            'has_section' => 'nullable',
            'is_active' => 'nullable',
            'sections' => 'nullable'
        ];
    }
}
