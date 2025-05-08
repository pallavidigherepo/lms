<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeeDiscountResource;
use App\Models\FeeDiscount;
use App\Http\Requests\StoreFeeDiscountRequest;
use App\Http\Requests\UpdateFeeDiscountRequest;
use App\Services\FeeDiscount\FeeDiscountService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * This class is FeeDiscountController controller class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeDiscount_Controller
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_discounts
 */
class FeeDiscountController extends Controller
{
    public function __construct(protected FeeDiscountService $feeDiscountService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request):ResourceCollection
    {
        return $this->feeDiscountService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeeDiscountRequest $request)
    {
        if (!$request->validated()) {
            return false;
        }
       
        $feeDiscount = $this->feeDiscountService->create($request);

        if (!$feeDiscount) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $feeDiscount], 201);
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return FeeDiscountResource::make(FeeDiscount::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeeDiscountRequest $request, FeeDiscount $feeDiscount)
    {
        $feeDiscount = $this->feeDiscountService->update($request, $feeDiscount);
        if (!$feeDiscount) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $feeDiscount], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeDiscount $feeDiscount)
    {
        if (!$this->feeDiscountService->delete($feeDiscount)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
