<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Permission;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'permissions' => $this->getAllPermissions(),
            // 'permissions_count' => count($this->getAllPermissions()),
            // 'all_permissions_count' => Permission::count(),
            // 'role_out_of_permission' => count($this->getAllPermissions()) ."/". Permission::count(),
            'permissions' => $this->permissions,
            'permissions_count' => $this->permissions,
            'all_permissions_count' => Permission::count(),
            'role_out_of_permission' => $this->permissions ."/". Permission::count(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
