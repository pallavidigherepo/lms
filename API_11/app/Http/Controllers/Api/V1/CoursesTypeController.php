<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoursesType;
use App\Services\CourseType\CourseTypeService;
use App\Http\Requests\CoursesTypeRequest;
use App\Http\Resources\CoursesTypeResource;

class CoursesTypeController extends Controller
{
    public function __construct(protected CourseTypeService $courseTypeService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->courseTypeService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesTypeRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $coursesType = $this->courseTypeService->create($request);

        if (!$coursesType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $coursesType], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesTypeRequest $request, CoursesType $coursesType)
    {
        $coursesType = $this->courseTypeService->update($request, $coursesType);
        if (!$coursesType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $coursesType], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursesType $coursesType)
    {
        if (!$this->courseTypeService->delete($coursesType)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }


    public function list()
    {
        return CoursesType::orderBy('label', 'asc')->get();
    }
}
