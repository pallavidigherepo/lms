<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tags = array();
        if (!empty($this->tags)) {
            foreach ($this->tags as $tag) {
                $tags[] = $tag->name;
            }
        }
        return [
            'id' => $this->id,
            'question' => $this->question,
            'description' => $this->description,
            'board' => $this->board->name,
            'standard' => $this->standard->name,
            'board_id' => $this->board_id,
            'standard_id' => $this->standard_id,
            'difficulty_level_id' => $this->difficulty_level_id,
            'type_id' => $this->type_id,
            'type' => json_decode($this->question_type->name),
            'language_id' => $this->language_id,
            'subject_id' => $this->subject_id,
            'chapter_id' => $this->chapter_id,
            // 'topic_id' => $this->topic_id,
            'subject' => json_decode($this->subject->label),
            'chapter' => json_decode($this->chapter->label),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'note' => $this->note,
            'marks' => $this->marks,
            'negative_marks' => $this->negative_marks,
            'tags' => $tags,
            'answers' => $this->answers,
            'questions' => $this->questions ,
            //'questions_withanswers' => new QuestionResource($this->id),
            //'questions' => QuestionResource::collection($this->whenLoaded('answers')),
            //'questions' => QuestionResource::collection($this->answers),
        ];
    }
}
