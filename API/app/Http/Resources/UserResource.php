<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'is_verified' => $this->email_verified_at != null ? true : false,
            'mobile' => $this->profile_user->mobile ?? null,
            'designation' => $this->profile_user->designation ?? null,
            'gender' => $this->profile_user->gender ?? null,
            'gender_name' => ucfirst($this->profile_user->gender) ?? null,
            'qualification' => $this->profile_user->qualification ?? null,
            'date_of_joining' => $this->profile_user->date_of_joining ?? null,
            'avatar' => file_exists($this->profile_user->avatar) ? URL::to($this->profile_user->avatar) : URL::to("storage/images/no-image.jpg"),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
