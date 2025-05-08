<?php
namespace App\Repositories;

use App\Models\StudentPaper;
use App\Http\Resources\StudentPaperResource;
use App\Repositories\Interfaces\StudentPaperRepositoryInterface;
use App\Http\Requests\StoreStudentPaperRequest;
use App\Http\Requests\UpdateStudentPaperRequest;
use Illuminate\Support\Facades\Auth;

class StudentPaperRepository implements StudentPaperRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return StudentPaperResource::collection(
            StudentPaper::when(request('search'), function ($query) {
                //$query->where('name', 'like', '%' . request('search') . '%');
            })
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $startEndDate = explode(' - ', $request->start_end_date);
            $input = [
                'generated_question_paper_id' => $request->generated_question_paper_id,
                'batch_id' => $request->batch_id,
                'course_id' => $request->course_id,
                'subject_id' => $request->subject_id,
                'solved_questions' => $request->solved_questions,
                'total_marks' => $request->solved_questions['template_info']['total_marks'],
                'total_time' => $request->solved_questions['template_info']['duration'],
                'start_date' => $startEndDate[0],
                'end_date' => $startEndDate[1],
                'can_retest' => $request->can_retest,
                'show_result_on' => $request->show_result_on,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];

            // First of all we need to check if student is already assigned with this question_paper_id
            $existingStudentIds = StudentPaper::where('generated_question_paper_id', $request->generated_question_paper_id)
                ->where('batch_id', $request->batch_id)
                ->where('course_id', $request->course_id)
                ->get()
                ->pluck('student_id')->toArray();

            // List of students teacher has selected.
            $newStudentIds = Arr::pluck($request->students, 'id');

            // Add only those who are not assigned with question_paper
            $studentToAdd = array_diff($newStudentIds, $existingStudentIds);

            $studentPaper = [];
            if (!empty($studentToAdd)) {
                $i = 0;
                foreach ($studentToAdd as $studentId) {
                    $input['student_id'] = $studentId;
                    $input['unique_code'] = Str::random(15);
                    $studentPaper[$i++] = StudentPaper::create($input);
                }
            }

            $response = [
                'success' => true,
                'message' => 'Paper assigned to student successfully.',
                'student_paper' => $studentPaper,
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
        return new StudentPaperResource(StudentPaper::findOrFail($studentPaper->id));
    }

    public function update($request, $studentPaper)
    {
        if ($request->validated()) {
            $studentPaper->update($this->saveFields($request));

            $response = [
                'success' => true,
                'message' => 'Student created successfully.',
                'student_paper' => $studentPaper,
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

    public function delete($studentPaper)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($studentPaper->delete()) {
            $response = [
                'success' => true,
                'message' => 'Student paper deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
