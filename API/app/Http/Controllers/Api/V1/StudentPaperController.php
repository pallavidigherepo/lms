<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\GeneratedQuestionPaper;
use App\Models\StudentPaper;
use App\Http\Requests\StoreStudentPaperRequest;
use App\Http\Requests\UpdateStudentPaperRequest;
use App\Http\Resources\StudentPaperResource;
use App\Services\StudentPaper\StudentPaperService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/**
 *
 */
class StudentPaperController extends Controller
{
    public function __construct(protected StudentPaperService $studentPaperService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return $this->studentPaperService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentPaperRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStudentPaperRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $studentPaper = $this->studentPaperService->create($request);

        if (!$studentPaper) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $studentPaper], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentPaper $studentPaper
     * @return StudentPaperResource
     */
    public function show(StudentPaper $studentPaper)
    {
        return StudentPaperResource::make(StudentPaper::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentPaperRequest  $request
     * @param  StudentPaper  $studentPaper
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateStudentPaperRequest $request, StudentPaper $studentPaper)
    {
        $studentPaper = $this->studentPaperService->update($request, $studentPaper);
        if (!$studentPaper) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $studentPaper], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StudentPaper $studentPaper
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(StudentPaper $studentPaper)
    {
        if (!$this->studentPaperService->delete($studentPaper)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
