<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Resources\Json\ResourceCollection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\RoleResource;
use App\Http\Requests\RoleRequest;
use App\Services\Role\RoleService;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use DB;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService) {
        // $this->authorizeResource(Role::class, 'role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->roleService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleService->create($request);

        if (!$role) {
            return response()->json(['message' => 'There are a few errors. Please check again.'], 403);
        }
        return response()->json(['message' => 'Save Successfully', 'data' => $role], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        list($response, $final) = $this->roleService->edit($role);

        return response()->json(['response' => $response, 'final' => $final], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role = $this->roleService->update($request, $role);

        if (!$role) {
            return response()->json(['message' => 'There are a few errors. Please check again.'], 403);
        }
        return response()->json(['message' => 'Save Successfully', 'data' => $role], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($role->delete()) {
            $response = [
                'success' => true,
                'message' => 'Role deleted successfully.',
                'role' => $role,
                'roles' => RoleResource::collection(Role::latest()->simplePaginate(10)),
            ];
        }
        return response()->json($response, 200);
    }
}
