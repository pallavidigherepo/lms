<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneratedQuestionPaperResource extends JsonResource
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
            'name' => $this->name,
            'is_auto' => $this->is_auto,
            'generated_questions' => json_decode($this->generated_questions),
            'board' => $this->template->board->name,
            'standard' => $this->template->standard->name,
            'subject_id' => $this->subject_id,
            'subject' => json_decode($this->subject->label),
            'chapter_id' => $this->chapter_id,
            'chapter' => $this->chapter_id != null ? json_decode($this->chapter->label) : null ,
            'topic_id' => $this->topic_id,
            'topic' => $this->topic_id != null ? json_decode($this->topic->label) : null,
            'difficulty_level_id' => $this->difficulty_level_id,
            'difficulty_level' => $this->difficulty_level_id != null ? $this->difficulty_level->name : null,
            'template_id' => $this->template_id,
            'template' => $this->template->name,
            'template_info' => $this->template,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
