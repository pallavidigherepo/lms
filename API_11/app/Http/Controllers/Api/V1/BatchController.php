<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Http\Resources\BatchResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\Batch\BatchService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BatchController extends Controller
{

    public function __construct(protected BatchService $batchService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->batchService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BatchRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $batch = $this->batchService->create($request);

        if (!$batch) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $batch], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BatchResource::make(Batch::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, Batch $batch)
    {
        
        $batch = $this->batchService->update($request, $batch);
        if (!$batch) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $batch], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Batch  $batch
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Batch $batch)
    {
        if (!$this->batchService->delete($batch)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
