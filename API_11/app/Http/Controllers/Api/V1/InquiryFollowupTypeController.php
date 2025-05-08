<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InquiryFollowupTypeResource;
use App\Models\InquiryFollowupType;
use App\Http\Requests\StoreInquiryFollowupTypeRequest;
use App\Http\Requests\UpdateInquiryFollowupTypeRequest;
use App\Services\InquiryFollowupType\InquiryFollowupTypeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InquiryFollowupTypeController extends Controller
{
    public function __construct(protected InquiryFollowupTypeService $inquiryFollowupTypeService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->inquiryFollowupTypeService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInquiryFollowupTypeRequest $request
     * @return Response
     */
    public function store(StoreInquiryFollowupTypeRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $inquiryFollowupType = $this->inquiryFollowupTypeService->create($request);

        if (!$inquiryFollowupType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $inquiryFollowupType], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param InquiryFollowupType $inquiryFollowupType
     * @return Response
     */
    public function show(InquiryFollowupType $inquiryFollowupType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInquiryFollowupTypeRequest $request
     * @param InquiryFollowupType $inquiryFollowupType
     * @return Response
     */
    public function update(UpdateInquiryFollowupTypeRequest $request, InquiryFollowupType $inquiryFollowupType)
    {
        $inquiryFollowupType = $this->inquiryFollowupTypeService->update($request, $inquiryFollowupType);
        if (!$inquiryFollowupType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $inquiryFollowupType], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InquiryFollowupType $inquiryFollowupType
     * @return Response
     */
    public function destroy(InquiryFollowupType $inquiryFollowupType)
    {
        if (!$this->inquiryFollowupTypeService->delete($inquiryFollowupType)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
