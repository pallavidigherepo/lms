<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInquiryFollowupRequest extends FormRequest
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
            'inquiry_id' => [
                'required',
            ],
            'inquiry_status_id' => [
                'required',
            ],
            'inquiry_followup_type_id' => [
                'required',
            ],
        ];
    }
}
