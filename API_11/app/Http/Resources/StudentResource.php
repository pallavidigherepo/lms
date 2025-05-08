<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'enrollment_number' => $this->enrollment_number,
            'name' => $this->name,
            'email' => $this->email,
            'aadhaar' => $this->aadhaar,
            'parent_id' => $this->parent_id,
            'board_id' => $this->board_id,
            'board' => $this->board->name ?? $this->board_id,
            'standard_id' => $this->standard_id,
            'standard' => $this->standard->name ?? $this->standard_id,
            'batch_id' => $this->batch_id,
            'batch' => $this->batch->name ?? $this->batch_id,
            'course_id' => $this->course_id,
            'mobile' => $this->mobile,
            'alt_mobile' => $this->alt_mobile,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'permanent_address' => $this->permanent_address,
            'address' => $this->address,
            'avatar' => file_exists($this->avatar) ? URL::to($this->avatar) : URL::to("storage/images/no-image.jpg"),
            'generated_questions' => $this->generated_question_papers(),
            'student_papers' => $this->student_papers,
            'student_parent' => $this->student_parent,
            'student_siblings' => $this->student_siblings,
            'student_fee' => $this->fee,
            'student_fee_type' => $this->fee->fee_type->name ?? $this->fee,
            'blood_group' => $this->blood_group,
            'medical_notes' => $this->medical_notes,
            'caste' => $this->caste,
            'religion' => $this->religion,
            'mother_tongue_language' => $this->mother_tongue_language,
            'interests' => $this->interests,
            'student_documents' => $this->student_documents,
        ];
    }
}
