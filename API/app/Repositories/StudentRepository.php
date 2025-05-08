<?php
namespace App\Repositories;

use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentRepository implements StudentRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        $batch = $request->input('batch_id') ?? null;
        $course = $request->input('course_id') ?? null;
        if (!$batch && !$course) {
            return StudentResource::collection(
                Student::when(request('search'), function ($query) {
                    $query->where('name', 'like', '%'. request('search'). '%');
                })

                    ->orderBy($field, $order)
                    ->paginate($perPage)
            );
        } else {
            return StudentResource::collection(
                Student::when(request('search'), function ($query) {
                    $query->where('name', 'like', '%'. request('search'). '%');
                })
                    ->where('batch_id', $batch)
                    ->where('course_id', $course)
                    ->orderBy($field, $order)
                    ->paginate($perPage)
            );
        }
    }

    public function create($request)
    {
        if ($request->validated()) {
            $student = Student::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Student created successfully.',
                'student' => $student,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $studentModel = new Student();
        // We need manipulated data of student so that he/she cannot do any kind of cheating.
        //return $studentModel->manipulateStudentInfo(new StudentResource(Student::findOrFail($student->id)));
        return new StudentResource(Student::findOrFail($student->id));
    }

    public function update($request, $student)
    {
        if ($request->validated()) {
            $student->update($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Student created successfully.',
                'student' => $student,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function delete($student)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($student->avatar) {
            $absolutePath = public_path($student->avatar);
            File::delete($absolutePath);
        }
        if ($student->delete()) {
            $response = [
                'success' => true,
                'message' => 'Student deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
