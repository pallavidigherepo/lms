<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
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
        $subject = "";
        if ($this->subject) {
            $subject = json_decode($this->subject->label);
        }
        $chapter = "";
        if ($this->chapter) {
            $chapter = json_decode($this->chapter->label);
        }
        return [
            'id' => $this->id,
            'label' => json_decode($this->label),
            'description' => json_decode($this->description),
            'icon' => $this->icon,
            'tags' => $tags,
            'tags_list' => $tags,
            'language_id' => $this->language_id,
            'subject' => $subject,
            'chapter' => $chapter,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
