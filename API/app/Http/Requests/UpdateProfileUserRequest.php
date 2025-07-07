<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'alt_email' => 'required|email|unique:profile_users,alt_email',
            'mobile' => 'required|string|max:15',
            'alt_mobile' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            //'alt_address' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'qualification' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048', // max 2MB
            'designation' => 'required|string',
            'date_of_joining' => 'required|date',
        ];
    }
}
