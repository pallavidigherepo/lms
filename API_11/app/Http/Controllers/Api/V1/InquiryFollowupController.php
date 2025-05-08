<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InquiryFollowupResource;
use App\Models\InquiryFollowup;
use App\Http\Requests\StoreInquiryFollowupRequest;
use App\Http\Requests\UpdateInquiryFollowupRequest;
use App\Services\InquiryFollowup\InquiryFollowupService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InquiryFollowupController extends Controller
{
    public function __construct(protected InquiryFollowupService $inquiryFollowupService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->inquiryFollowupService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInquiryFollowupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryFollowupRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $inquiryFollowup = $this->inquiryFollowupService->create($request);

        if (!$inquiryFollowup) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $inquiryFollowup], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InquiryFollowup  $inquiryFollowup
     * @return \Illuminate\Http\Response
     */
    public function show(InquiryFollowup $inquiryFollowup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInquiryFollowupRequest  $request
     * @param  \App\Models\InquiryFollowup  $inquiryFollowup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquiryFollowupRequest $request, InquiryFollowup $inquiryFollowup)
    {
        $inquiryFollowup = $this->inquiryFollowupService->update($request, $inquiryFollowup);
        if (!$inquiryFollowup) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $inquiryFollowup], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InquiryFollowup  $inquiryFollowup
     * @return \Illuminate\Http\Response
     */
    public function destroy(InquiryFollowup $inquiryFollowup)
    {
        if (!$this->inquiryFollowupService->delete($inquiryFollowup)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
