<?php
namespace App\Repositories;

use App\Models\GeneratedQuestionPaper;
use App\Http\Resources\GeneratedQuestionPaperResource;
use App\Repositories\Interfaces\GeneratedQuestionPaperRepositoryInterface;
use App\Http\Requests\StoreGeneratedQuestionPaperRequest;
use App\Http\Requests\UpdateGeneratedQuestionPaperRequest;
use Illuminate\Support\Facades\Auth;

class GeneratedQuestionPaperRepository implements GeneratedQuestionPaperRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return GeneratedQuestionPaperResource::collection(
            GeneratedQuestionPaper::when(request('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
            })
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
    }

    public function create($request)
    {
        $response = [
            'success' => false,
            'message' => 'Failed to add'
        ];
        if ($request->validated()) {
            $input = [
                'name' => $request->name,
                'subject_id' => $request->subject_id,
                'chapter_id' => $request->chapter_id,
                'topic_id' => $request->topic_id,
                'template_id' => $request->template_id,
                'difficulty_level_id' => $request->difficulty_level_id,
                'is_auto' => $request->is_auto,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'generated_questions' => json_encode($request->generated_questions),
            ];

            $generatedQuestionPaper = GeneratedQuestionPaper::create($input);

            $response = [
                'success' => true,
                'message' => 'Question paper successfully generated.',
                'generatedQuestionPaper' => $generatedQuestionPaper,
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
        return new GeneratedQuestionPaperResource(GeneratedQuestionPaper::findOrFail($generatedQuestionPaper));
    }

    public function update($request, $generatedQuestionPaper)
    {
        if ($request->validated()) {
            $input = [
                'name' => $request->name,
                'subject_id' => $request->subject_id,
                'chapter_id' => $request->chapter_id,
                'topic_id' => $request->topic_id,
                'template_id' => $request->template_id,
                'difficulty_level_id' => $request->difficulty_level_id,
                'is_auto' => $request->is_auto,
                'generated_questions' => $request->generated_questions,
            ];
            $generateQuestionPaper->update($input);
        }
    }

    public function delete($generatedQuestionPaper)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        // $generatedQuestionPaper = GeneratedQuestionPaper::findOrFail($id);
        if ($generatedQuestionPaper->delete()) {
            unset($response);
            $response = [
                'success' => true,
                'message' => 'Question paper deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
