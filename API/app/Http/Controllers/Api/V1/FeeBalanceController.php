<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FeeBalance;
use App\Http\Requests\StoreFeeBalanceRequest;
use App\Http\Requests\UpdateFeeBalanceRequest;
use App\Services\FeeBalance\FeeBalanceService;

class FeeBalanceController extends Controller
{
    public function __construct(protected FeeBalanceService $feeBalanceService)
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
     * @param  \App\Http\Requests\StoreFeeBalanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeeBalanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeBalance  $feeBalance
     * @return \Illuminate\Http\Response
     */
    public function show(FeeBalance $feeBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeBalanceRequest  $request
     * @param  \App\Models\FeeBalance  $feeBalance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeeBalanceRequest $request, FeeBalance $feeBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeBalance  $feeBalance
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeBalance $feeBalance)
    {
        //
    }
}
