<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InquiryStatusResource;
use App\Models\InquiryStatus;
use App\Http\Requests\StoreInquiryStatusRequest;
use App\Http\Requests\UpdateInquiryStatusRequest;
use App\Services\InquiryStatus\InquiryStatusService;
use Illuminate\Http\Request;

class InquiryStatusController extends Controller
{
    public function __construct(protected InquiryStatusService $inquiryStatusService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->inquiryStatusService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInquiryStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryStatusRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $inquiryStatus = $this->inquiryStatusService->create($request);

        if (!$inquiryStatus) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $inquiryStatus], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InquiryStatus  $inquiryStatus
     * @return \Illuminate\Http\Response
     */
    public function show(InquiryStatus $inquiryStatus)
    {
        return InquiryStatusResource::make(InquiryStatus::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInquiryStatusRequest  $request
     * @param  \App\Models\InquiryStatus  $inquiryStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquiryStatusRequest $request, InquiryStatus $inquiryStatus)
    {
        $inquiryStatus = $this->inquiryStatusService->update($request, $inquiryStatus);
        if (!$inquiryStatus) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $inquiryStatus], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InquiryStatus  $inquiryStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(InquiryStatus $inquiryStatus)
    {
        if (!$this->inquiryStatusService->delete($inquiryStatus)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
