<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Permission/Index', [
            'permissions' => PermissionResource::collection(Permission::latest()->simplePaginate(5)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Permission/Create', [
            'edit' => false,
            'permission' => (object) [],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        try{
            Permission::create($request->validated());
            return redirect()->route('admin.permissions.index')->with('success', 'Permission is created successfully.');
        } catch (\Exception $exception) {
            return redirect()->route('admin.permissions.index')->with('error', 'Oops, something went wrong. Permission is now created.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return Inertia::render('Admin/Permission/Create', [
            'edit' => true,
            'permission' => new PermissionResource($permission)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return redirect()->route('admin.permissions.index')
                        ->with('success', 'Permission is edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')
                        ->with('success', 'Permission is deleted successfully.');
    }
}
