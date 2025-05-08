<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StandardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $sections = array();
        $sectionNames = array();
        if (!empty($this->sections)) {
            foreach ($this->sections as $section) {
                $sections[$section->id] = $section->id;
                $sectionNames[$section->id] = $section->name;
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'standard_section_ids' => $sections,
            'standard_section_names' => $sectionNames,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
