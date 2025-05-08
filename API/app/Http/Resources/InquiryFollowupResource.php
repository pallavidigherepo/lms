<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InquiryFollowupResource extends JsonResource
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
            'inquiry_id' => $this->inquiry_id,
            'inquiry' => $this->inquiry ?? $this->inquiry_id,
            'inquiry_status_id' => $this->inquiry_status_id,
            'status' => $this->status->name ?? $this->inquiry_status_id,
            'inquiry_followup_type_id' => $this->inquiry_followup_type_id,
            'followup_type' => $this->followup_type->name ?? $this->inquiry_followup_type_id,
            'followup_date' => $this->followup_date,
            'followup_time' => $this->followup_time,
            'followup_comments' => $this->inquiry_comments,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
