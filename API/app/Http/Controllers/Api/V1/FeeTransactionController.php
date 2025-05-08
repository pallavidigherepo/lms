<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeeResource;
use App\Http\Resources\FeeTransactionResource;
use App\Models\Fee;
use App\Models\FeeTransaction;
use App\Http\Requests\StoreFeeTransactionRequest;
use App\Http\Requests\UpdateFeeTransactionRequest;
use App\Services\FeeTransaction\FeeTransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeeTransactionController extends Controller
{
    public function __construct(protected FeeTransactionService $feeTransactionService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->feeTransactionService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeeTransactionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFeeTransactionRequest $request): JsonResponse
    {
        if (!$request->validated()) {
            return false;
        }
       
        $feeTransaction = $this->feeTransactionService->create($request);

        if (!$feeTransaction) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $feeTransaction], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeTransaction  $feeTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(FeeTransaction $feeTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeTransactionRequest  $request
     * @param  \App\Models\FeeTransaction  $feeTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeeTransactionRequest $request, FeeTransaction $feeTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeTransaction  $feeTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeTransaction $feeTransaction)
    {
        //
    }
}
