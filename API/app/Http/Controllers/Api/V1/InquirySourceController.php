<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InquirySourceResource;
use App\Models\InquirySource;
use App\Services\InquirySource\InquirySourceService;
use App\Http\Requests\StoreInquirySourceRequest;
use App\Http\Requests\UpdateInquirySourceRequest;
use Illuminate\Http\Request;

class InquirySourceController extends Controller
{
    public function __construct(protected InquirySourceService $inquirySourceService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->inquirySourceService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInquirySourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquirySourceRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $inquirySource = $this->inquirySourceService->create($request);

        if (!$inquirySource) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $inquirySource], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InquirySource  $inquirySource
     * @return \Illuminate\Http\Response
     */
    public function show(InquirySource $inquirySource)
    {
        return InquirySourceResource::make(InquirySource::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInquirySourceRequest  $request
     * @param  \App\Models\InquirySource  $inquirySource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquirySourceRequest $request, InquirySource $inquirySource)
    {
        $inquirySource = $this->inquirySourceService->update($request, $inquirySource);
        if (!$inquirySource) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $inquirySource], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InquirySource  $inquirySource
     * @return \Illuminate\Http\Response
     */
    public function destroy(InquirySource $inquirySource)
    {
        if (!$this->inquirySourceService->delete($inquirySource)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
