<?php
namespace App\Services\FeeTransaction;

use App\Http\Requests\StoreFeeTransactionRequest;
use App\Models\FeeTransaction;
use App\Repositories\Interfaces\FeeTransactionRepositoryInterface;
use Illuminate\Http\Request;

class FeeTransactionService
{

    public function __construct(protected FeeTransactionRepositoryInterface $feeTransactionRepository) { }

    public function all($request)
    {
        return $this->feeTransactionRepository->all($request);
    }


    public function create(StoreFeeTransactionRequest $request)
    {

        return $this->feeTransactionRepository->create($request);
    }

    public function update(Request $request, $feeTransaction)
    {
        return $this->feeTransactionRepository->update($request, $feeTransaction);
    }


    public function delete(FeeTransaction $feeTransaction)
    {
        return $this->feeTransactionRepository->delete($feeTransaction);
    }

}
