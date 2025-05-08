<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentParentResource;
use App\Models\StudentParent;
use App\Http\Requests\StoreStudentParentRequest;
use App\Http\Requests\UpdateStudentParentRequest;
use Illuminate\Http\Request;

class StudentParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return StudentParentResource::collection(
            StudentParent::when(request('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
            })
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentParentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentParentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function show(StudentParent $studentParent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentParentRequest  $request
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentParentRequest $request, StudentParent $studentParent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentParent $studentParent)
    {
        //
    }
}
