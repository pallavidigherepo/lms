<?php
namespace App\Repositories;

use App\Models\CoursesType;
use App\Http\Resources\CoursesTypeResource;
use App\Repositories\Interfaces\CourseTypeRepositoryInterface;
use App\Http\Requests\CourseTypeRequest;
use Illuminate\Support\Facades\Auth;


class CourseTypeRepository implements CourseTypeRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        $coursesTypes = CoursesTypeResource::collection(
            CoursesType::when($request->input('search'), function ($query) {
                $query->where('label', 'like', '%' . request('search') . '%');
                $query->orWhere('description', 'like', '%' . request('search') . '%');
                $query->orWhere('icon', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
        return $coursesTypes;
    }

    public function create($request)
    {
        if ($request->validated()) {
            $inputs = [
                'label'=> json_encode($request->label),
                'description' => json_encode($request->description),
                'icon'=> $request->icon,
            ];
            $coursesType = CoursesType::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Courses type created successfully.',
                'coursesType' => $coursesType,
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

    public function show($id)
    {
        //
    }

    public function update($request, $coursesType)
    {
        if ($request->validated()) {

            $coursesType->label = json_encode($request->label);
            $coursesType->description = json_encode($request->description);
            $coursesType->icon = $request->icon;

            $coursesType->save();
            $response = [
                'success' => true,
                'message' => 'Courses type updated successfully.',
                'coursesType' => $coursesType,
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

    public function delete($coursesType)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($coursesType->delete()) {
            $response = [
                'success' => true,
                'message' => 'courses type deleted successfully.',
                'coursesType' => $coursesType,
            ];
        }
        return response()->json($response);
    }

    public function list()
    {
        $coursesType = CoursesType::orderBy('label', 'asc')->get();
        return response()->json($coursesType);
    }
}
