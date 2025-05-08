<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
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
            'label' => json_decode($this->label),
            'description' => json_decode($this->description),
            'icon' => $this->icon,
            'board_id' => $this->board_id,
            'standard_id' => $this->standard_id,
            'board' => $this->board->name ?? $this->board_id,
            'standard' => $this->standard->name ?? $this->standard_id,
            'tags' => $tags,
            'tags_list' => $tags,
            'chapters_count' => count($this->chapters),
            'chapters' => $this->chapters,
            //'topics_count' => count($this->chapter->topics),
            'language_id' => $this->language_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
