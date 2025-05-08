<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardRequest;
use App\Http\Resources\StandardResource;
use App\Models\Standard;
use App\Services\Standard\StandardService;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function __construct(protected StandardService $standardService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->standardService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StandardRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $standard = $this->standardService->create($request);

        if (!$standard) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $standard], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StandardResource::make(Standard::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StandardRequest $request, Standard $standard)
    {
        $standard = $this->standardService->update($request, $standard);
        if (!$standard) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $standard], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standard $standard)
    {
        if (!$this->standardService->delete($standard)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
