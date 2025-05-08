<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneratedQuestionPaperRequest;
use App\Http\Resources\GeneratedQuestionPaperResource;
use App\Models\GeneratedQuestionPaper;
use App\Services\GeneratedQuestionPaper\GeneratedQuestionPaperService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneratedQuestionPaperController extends Controller
{
    public function __construct(protected GeneratedQuestionPaperService $generatedQuestionPaperService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->generatedQuestionPaperService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneratedQuestionPaperRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $generatedQuestionPaper = $this->generatedQuestionPaperService->create($request);

        if (!$generatedQuestionPaper) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $generatedQuestionPaper], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  GeneratedQuestionPaper  $generatedQuestionPaper
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return GeneratedQuestionPaperResource::make(GeneratedQuestionPaper::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneratedQuestionPaperRequest $request, GeneratedQuestionPaper $generateQuestionPaper)
    {
        $generatedQuestionPaper = $this->generatedQuestionPaperService->update($request, $generatedQuestionPaper);
        if (!$generatedQuestionPaper) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $generatedQuestionPaper], 201);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  GeneratedQuestionPaper $generateQuestionPaper
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $generatedQuestionPaper = GeneratedQuestionPaper::findOrFail($id);
        if (!$this->generatedQuestionPaperService->delete($generatedQuestionPaper)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
