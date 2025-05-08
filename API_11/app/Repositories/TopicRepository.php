<?php
namespace App\Repositories;

use App\Models\Topic;
use App\Http\Resources\TopicResource;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Requests\ChapterRequest;
use Illuminate\Support\Facades\Auth;

class TopicRepository implements TopicRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        $topics = TopicResource::collection(
            Topic::when(request('search'), function ($query) {
                $query->where('parent_id', request('item'));
                $query->where('label', 'like', '%' . request('search') . '%');
                $query->orWhere('icon', 'like', '%' . request('search') . '%');
            })
                ->where('parent_id', $request->input('item'))
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
        return $topics;
    }

    public function create($request)
    {
       
    }

    public function show($id)
    {
        
    }

    public function update($request, $topic)
    {
       
    }

    public function delete($topic)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        
        if ($topic->delete()) {
            $response = [
                'success' => true,
                'message' => 'Topic deleted successfully.',
            ];
        }
        return response()->json($response);
    }

    public function list()
    {
        $chapters = Topic::with('chapters')->get()->pluck('id', 'label');
        dd($chapters);
    }
}
