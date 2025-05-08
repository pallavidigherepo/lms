<?php
namespace App\Repositories;

use App\Models\FeeTransaction;
use App\Http\Resources\FeeTransactionResource;
use App\Repositories\Interfaces\FeeTransactionRepositoryInterface;
use App\Http\Requests\StoreFeeTransactionRequest;
use App\Http\Requests\UpdateFeeTransactionRequest;
use Illuminate\Support\Facades\Auth;

class FeeTransactionRepository implements FeeTransactionRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        $feeId = $request->input('fee_id') ?? null;

        return FeeTransactionResource::collection(
            FeeTransaction::when($request->input('search'), function ($query) {
                //$query->where('fee_id', '=', request('fee_id'));
            })->where('fee_id', $feeId)->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $feeTransaction = FeeTransaction::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Fee transaction done successfully.',
                'fee_transaction' => new FeeTransactionResource(FeeTransaction::FindOrFail($feeTransaction->id)),
                'fee' => new FeeResource(Fee::FindOrFail($request->fee_id))
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
       
    }

    public function update($request, $feeTransaction)
    {
       
    }

    public function delete($feeTransaction)
    {
        
    }
}
