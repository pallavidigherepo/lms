<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FeeStudentDiscount;
use App\Http\Requests\StoreFeeStudentDiscountRequest;
use App\Http\Requests\UpdateFeeStudentDiscountRequest;
use App\Services\FeeStudentDiscount\FeeStudentDiscountService;

class FeeStudentDiscountController extends Controller
{
    public function __construct(protected FeeStudentDiscountService $feeStudentDiscountService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeeStudentDiscountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeStudentDiscount $feeStudentDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeeStudentDiscountRequest $request, FeeStudentDiscount $feeStudentDiscount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeStudentDiscount $feeStudentDiscount)
    {
        //
    }
}
