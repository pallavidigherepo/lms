<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\StudentPaper;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 *
 */
class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return $this->studentService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     * LOGIC: When a student is created, following steps are followed
     * STEP 1: Check if parent's information is available in parents table. If parent is available, then use that parent_id
     *          else, create a new parent and then use that id for storing student.
     * STEP 2: After parent_id is retrieved, student will be mapped accordingly.
     * STEP 3: After student is stored, check if there is any other student is available to that parent. If there is
     *          any student available then we need to update/insert records in student_siblings
     *          table with "reverse mapping".
     *
     * @param StoreStudentRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(StoreStudentRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $student = $this->studentService->create($request);

        if (!$student) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $student], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Student  $student
     * @return StudentResource
     */
    //public function show(Student $student) :array
    public function show(Student $student)
    {
        return StudentResource::make(Student::findOrFail($student->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return Response
     * @throws \Exception
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student = $this->studentService->update($request, $student);
        if (!$student) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $student], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student $student)
    {
        if (!$this->studentService->delete($student)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
