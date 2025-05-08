<?php
namespace App\Repositories;

use App\Models\Chapter;
use App\Models\Language;
use App\Models\Subject;
use App\Http\Resources\ChapterResource;
use App\Repositories\Interfaces\ChapterRepositoryInterface;
use App\Http\Requests\ChapterRequest;
use Illuminate\Support\Facades\Auth;

class ChapterRepository implements ChapterRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        $chapters = ChapterResource::collection(
            Chapter::when(request('search'), function ($query) {
                $query->where('label', 'like', '%' . request('search') . '%');
                $query->where('parent_id', '=', request('item'));
                $query->orWhere('icon', 'like', '%' . request('search') . '%');
            })
                ->where('parent_id', '=', $request->item)
                ->with('subject')
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
        return $chapters;
    }

    public function create($request)
    {
        if ($request->validated()) {
            $inputs = [
                'label'=> json_encode($request->label),
                'description' => json_encode($request->description),
                'icon' => $request->icon,
                'language_id' => $request->language_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'parent_id' => $request->parent_id
            ];
            
    	    //$tags = $request->tags;
            $chapter = Chapter::create($inputs);
            $chapter->detachTags($request->tags_list);
            $chapter->attachTags($request->tags_list);
            //$chapter->tags = $request->tags;

            $response = [
                'success' => true,
                'message' => 'Subject is created successfully.',
                'chapter' => $chapter,
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

    public function edit($data)
    {
        return new ChapterResource(Chapter::findOrFail($chapter->id));
    }
    public function show($id)
    {
        return new ChapterResource(Chapter::findOrFail($chapter->id));
    }

    public function update($request, $chapter)
    {
        if ($request->validated()) {
            $inputs = [
                'label'=> json_encode($request->label),
                'description' => json_encode($request->description),
                'icon' => $request->icon,
                'language_id' => $request->language_id,
                'updated_by' => Auth::user()->id,
                'parent_id' => $request->parent_id
            ];
            
    	    $tags = $request->tags;
            $chapter->update($inputs);

            $chapter->detachTags($request->tags_list);
            $chapter->attachTags($request->tags_list);
            $chapter->tags = $request->tags;

            $response = [
                'success' => true,
                'message' => 'Chapter is updated successfully.',
                'chapter' => $chapter,
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

    public function delete($chapter)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        
        if ($chapter->delete()) {
            $response = [
                'success' => true,
                'message' => 'Chapter deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
