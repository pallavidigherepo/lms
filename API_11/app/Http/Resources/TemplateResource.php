<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Boolean;

class TemplateResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'board_id' => $this->board_id,
            'board' => $this->board->name,
            'standard_id' => $this->standard_id,
            'standard' => $this->standard->name,
            'total_marks' => $this->total_marks,
            'total_questions' => $this->total_questions,
            'compulsory_questions' => $this->compulsory_questions,
            'type_id' => $this->type_id,
            'type_name' => $this->type->name ?? $this->type_id,
            'duration' => $this->duration,
            'has_section' => boolval($this->has_section),
            'is_active' => boolval($this->is_active),
            'sections' => json_decode($this->sections),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
