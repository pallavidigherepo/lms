<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeeTypeResource;
use App\Models\FeeType;
use App\Http\Requests\StoreFeeTypeRequest;
use App\Http\Requests\UpdateFeeTypeRequest;
use App\Services\FeeType\FeeTypeService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

/**
 * This class is FeeTypeController controller class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeType_Controller
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_types
 */
class FeeTypeController extends Controller
{
    public function __construct(protected FeeTypeService $feeTypeService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return FeeTypeResource
     */
    public function index(Request $request):ResourceCollection
    {
        return $this->feeTypeService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeeTypeRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFeeTypeRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $feeType = $this->feeTypeService->create($request);

        if (!$feeType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $feeType], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeType  $feeType
     * @return FeeTypeResource
     */
    public function show(FeeType $feeType)
    {
        return FeeTypeResource::make(FeeType::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeTypeRequest  $request
     * @param  \App\Models\FeeType  $feeType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFeeTypeRequest $request, FeeType $feeType)
    {
        $feeType = $this->feeTypeService->update($request, $feeType);
        if (!$feeType) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $feeType], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeType  $feeType
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FeeType $feeType)
    {
        if (!$this->feeTypeService->delete($feeType)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
