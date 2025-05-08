<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class InquiryResource extends JsonResource
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
            'unique_code' => $this->unique_code,
            'standard_id' => $this->standard_id,
            'standard' => $this->standard->name ?? $this->standard_id,
            'batch_id' => $this->batch_id,
            'batch' => $this->batch->name ?? $this->batch_id,
            'course_id' => $this->course_id,
            'course' => $this->course->name ?? $this->course_id,
            'inquiry_status_id' => $this->inquiry_status_id,
            'status' => $this->status->name ?? $this->inquiry_status_id,
            'inquiry_source_id' => $this->inquiry_source_id,
            'source' => $this->source->name ?? $this->inquiry_source_id,
            'inquiry_followup_type_id' => $this->inquiry_followup_type_id,
            'followup_type' => $this->followup_type->name ?? $this->inquiry_followup_type_id,
            'student_name' => $this->student_name,
            'student_gender' => $this->student_gender,
            'student_dob' => $this->student_dob,
            'inquiry_date' => $this->inquiry_date,
            'assigned_to' => $this->assigned_to,
            'assigned' => $this->assigned->name ?? $this->assigned_to,
            'contact_name' => $this->contact_name,
            'contact_email' => $this->contact_email,
            'contact_mobile' => $this->contact_mobile,
            'reminder_count' => $this->reminder_count,
            'address' => $this->address,
            //'created_by' => $this->created->name,
            //'updated_by' => $this->updated->name,
        ];
    }
}
