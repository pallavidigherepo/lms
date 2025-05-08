<?php
namespace App\Repositories;

use App\Models\Template;
use App\Http\Resources\TemplateResource;
use App\Repositories\Interfaces\TemplateRepositoryInterface;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Support\Facades\Auth;

class TemplateRepository implements TemplateRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return TemplateResource::collection(
            Template::when(request('search'), function ($query) {
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
            'message' => 'Oops, something went wrong.'
        ];
        if ($request->validated()) {
            $inputData = [
                'board_id' => $request->board_id,
                'standard_id' => $request->standard_id,
                'name' => $request->name,
                'description' => $request->description,
                'total_marks' => $request->total_marks,
                'duration' => $request->duration,
                'has_section' => $request->has_section,
                'is_active' => $request->is_active,
                'total_questions' => $request->total_questions,
                'compulsory_questions' => $request->compulsory_questions,
                'type_id' => $request->type_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'sections' => $request->has_section ? json_encode($request->sections) : null,
            ];

            if ($template = Template::create($inputData)) {
                $response = [
                    'success' => true,
                    'message' => 'Successfully added',
                    'template' => $template,
                ];
            }
        }

        return response()->json($response, 200);
    }

    public function show($id)
    {
        return new TemplateResource(Template::findOrFail($template->id));
    }

    public function update($request, $template)
    {
        if ($request->validated()) {
            $inputData = [
                'board_id' => $request->board_id,
                'standard_id' => $request->standard_id,
                'name' => $request->name,
                'description' => $request->description,
                'total_marks' => $request->total_marks,
                'duration' => $request->duration,
                'has_section' => $request->has_section,
                'is_active' => $request->is_active,
                'total_questions' => $request->total_questions,
                'compulsory_questions' => $request->compulsory_questions,
                'type_id' => $request->type_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'sections' => $request->has_section ? json_encode($request->sections) : null,
            ];

            $template->update($inputData);

            $response = [
                'success' => true,
                'message' => 'Subject is updated successfully.',
                'template' => $template,
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

    public function delete($template)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];

        if ($template->delete()) {
            $response = [
                'success' => true,
                'message' => 'Template deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
