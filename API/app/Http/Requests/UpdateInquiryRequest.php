<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInquiryRequest extends FormRequest
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
            'standard_id' => [
                'required',
            ],
            'batch_id' => [
                'required',
            ],
            /*'course_id' => [
                'required',
            ],
            'inquiry_status_id' => [
                'required',
            ],*/
            'inquiry_source_id' => [
                'required',
            ],
            'assigned_to' => [
                'required',
            ],
            'student_name' => [
                'required',
            ],
            'student_gender' => [
                'required',
            ],
            'contact_name' => [
                'required',
            ],
            'contact_email' => [
                'required',
            ],
            'contact_mobile' => [
                'required',
            ],
        ];
    }
}
