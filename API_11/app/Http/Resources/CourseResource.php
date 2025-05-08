<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
        //$types = [];
        $types = array();
        if (!empty($this->courses_types)) {
            foreach ($this->courses_types as $courseType) {            
                $types[$courseType->id] = $courseType->id;
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'course_code' => $this->course_code,
            //'tags' => $this->tags,
            'tags' => $tags,
            'tags_list' => $tags,
            'courses_types' => $this->courses_types,
            'type_ids' => $types,
            'language_id' => $this->language_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
