<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateRequest;
use App\Http\Resources\TemplateResource;
use App\Models\QuestionType;
use App\Models\Template;
use App\Services\Template\TemplateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function __construct(protected TemplateService $templateService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->templateService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $template = $this->templateService->create($request);

        if (!$template) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $template], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        return TemplateResource::make(Template::findOrFail($template->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateRequest $request
     * @param Template $template
     * @return Response
     */
    public function update(TemplateRequest $request, Template $template)
    {
        $template = $this->templateService->update($request, $template);
        if (!$template) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $template], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        if (!$this->templateService->delete($template)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
