<?php
namespace App\Repositories;

use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;


class CourseRepository implements CourseRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        $coursesTypes = CourseResource::collection(
            Course::when($request->input('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
                $query->orWhere('course_code', 'like', '%'. request('search'). '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
        return $coursesTypes;
    }

    public function create($request)
    {
        $tags = $request->tags_list;
        //$request->tags = $request->tags_list;
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
                'course_code' => $request->course_code,
                'type_id' => $request->type_ids,
                'language_id' => $request->language_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];

    	    //$tags = $request->tags_list;
            $course = Course::create($inputs);
            $course->attachTags($tags);
            $course->courses_types()->sync($request->type_ids);
            $course->tags_list = $tags;
            $course->type_ids = $request->type_ids;
            //$recentCourse = CourseResource::collection(Course::findOrFail($course->id));
            $response = [
                'success' => true,
                'message' => 'Course created successfully.',
                'course' => $course,
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
        //
    }

    public function update($request, $course)
    {
        $inputs = $request->all();
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
                'course_code' => $request->course_code,
                'type_id' => $request->type_ids,
                'language_id' => $request->language_id,
                'updated_by' => Auth::user()->id,
            ];
            $course->update($inputs);

            $tags = $request->tags_list;
            if ($tags !== null) {
                $course->syncTags($tags);
            }
            $course->courses_types()->sync($request->type_ids);
            $course->tags_list = $tags;
            $course->type_ids = $request->type_ids;
            $response = [
                'success' => true,
                'message' => 'Course updated successfully.',
                'course' => $course,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response);
    }

    public function delete($course)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];

        if ($course->delete()) {
            $response = [
                'success' => true,
                'message' => 'Subject deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
