<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FeeReceipt;
use App\Http\Requests\StoreFeeReceiptRequest;
use App\Http\Requests\UpdateFeeReceiptRequest;
use App\Services\FeeRecipt\FeeReciptService;

class FeeReceiptController extends Controller
{
    public function __construct(protected FeeReciptService $feeReciptService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeeReceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeeReceiptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeReceipt  $feeReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(FeeReceipt $feeReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeReceiptRequest  $request
     * @param  \App\Models\FeeReceipt  $feeReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeeReceiptRequest $request, FeeReceipt $feeReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeReceipt  $feeReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeReceipt $feeReceipt)
    {
        //
    }
}
