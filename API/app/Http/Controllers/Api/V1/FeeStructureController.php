<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeeStructureResource;
use App\Models\FeeStructure;
use App\Http\Requests\StoreFeeStructureRequest;
use App\Http\Requests\UpdateFeeStructureRequest;
use App\Services\FeeStructure\FeeStructureService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

/**
 * This class is FeeStructureController controller class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeStructure_Controller
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_structures
 */
class FeeStructureController extends Controller
{
    public function __construct(protected FeeStructureService $feeStructureService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request):ResourceCollection
    {
        return $this->feeStructureService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeeStructureRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFeeStructureRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $feeStructure = $this->feeStructureService->create($request);

        if (!$feeStructure) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $feeStructure], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return FeeStructureResource
     */
    public function show($id)
    {
        return FeeStructureResource::make(FeeStructure::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeStructureRequest  $request
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFeeStructureRequest $request, FeeStructure $feeStructure)
    {
        $feeStructure = $this->feeStructureService->update($request, $feeStructure);
        if (!$feeStructure) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $feeStructure], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeStructure  $feeStructure
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FeeStructure $feeStructure)
    {
        if (!$this->feeStructureService->delete($feeStructure)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
