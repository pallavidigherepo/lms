<?php
namespace App\Repositories;

use App\Models\Language;
use App\Models\Subject;
use App\Http\Resources\SubjectResource;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Http\Requests\SubjectRequest;
use Illuminate\Support\Facades\Auth;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        $subjects = SubjectResource::collection(
            Subject::when(request('search'), function ($query) {
                $query->where('parent_id', null);
                $query->where('label', 'like', '%' . request('search') . '%');
                $query->orWhere('icon', 'like', '%' . request('search') . '%');
            })
                ->where('parent_id', null)
                //->with('tags', 'courses_subjects')
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
        return $subjects;
    }

    public function create($request)
    {
        $tags = $request->tags_list;
        if ($request->validated()) {
            $inputs = [
                'label' => json_encode($request->label),
                'description' => json_encode($request->description),
                'board_id' => $request->board_id,
                'standard_id' => $request->standard_id,
                'icon' => $request->icon,
                'language_id' => $request->language_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'parent_id' => NULL
            ];

            $subject = Subject::create($inputs);

            $subject->detachTags($tags);
            $subject->attachTags($tags);
            $subject->courses_subjects()->sync($request->course_ids);
            $subject->tags = $request->tags_list;

            $response = [
                'success' => true,
                'message' => 'Subject is created successfully.',
                'subject' => $subject,
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

    public function edit($data)
    {
        return new SubjectResource(Subject::findOrFail($subject->id));
    }
    public function show($id)
    {
        return new SubjectResource(Subject::findOrFail($subject->id));
    }

    public function update($request, $subject)
    {
        if ($request->validated()) {
            $inputs = [
                'label' => json_encode($request->label),
                'description' => json_encode($request->description),
                'board_id' => $request->board_id,
                'standard_id' => $request->standard_id,
                'icon' => $request->icon,
                'language_id' => $request->language_id,
                'updated_by' => Auth::user()->id,
                'parent_id' => NULL
            ];

            $subject->update($inputs);

            $subject->detachTags($request->tags_list);
            $subject->attachTags($request->tags_list);
            $subject->courses_subjects()->sync($request->course_ids);
            $subject->tags = $request->tags_list;

            $response = [
                'success' => true,
                'message' => 'Subject is updated successfully.',
                'subject' => $subject,
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

    public function delete($subject)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];

        if ($subject->delete()) {
            $response = [
                'success' => true,
                'message' => 'Subject deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
