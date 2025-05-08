<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Language;
use App\Models\CoursesType;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Services\Course\CourseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->courseService->all($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CourseRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $course = $this->courseService->create($request);

        if (!$course) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $course], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CourseResource::make(Course::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course = $this->courseService->update($request, $course);
        if (!$course) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $course], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (!$this->courseService->delete($course)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
