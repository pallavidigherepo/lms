<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Course;
use App\Services\Subject\SubjectService;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function __construct(protected SubjectService $subjectService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->subjectService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $subject = $this->subjectService->create($request);

        if (!$subject) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $subject], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Object  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return new SubjectResource(Subject::findOrFail($subject->id));
    }


    /**
     * Display the specified resource.
     *
     * @param  Object  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return new SubjectResource(Subject::findOrFail($subject->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject = $this->subjectService->update($request, $subject);
        if (!$subject) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $subject], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        if (!$this->subjectService->delete($subject)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
