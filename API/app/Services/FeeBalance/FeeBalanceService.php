<?php
namespace App\Services\FeeBalance;

use App\Http\Requests\StoreFeeBalanceRequest;
use App\Http\Requests\UpdateFeeBalanceRequest;
use App\Models\FeeBalance;
use App\Repositories\Interfaces\FeeBalanceRepositoryInterface;
use Illuminate\Http\Request;

class FeeBalanceService
{

    public function __construct(protected FeeBalanceRepositoryInterface $feeBalanceRepository) { }

    public function all($request)
    {
        return $this->feeBalanceRepository->all($request);
    }


    public function create(FeeBalanceRequest $request)
    {

        return $this->feeBalanceRepository->create($request);
    }

    public function update(Request $request, $feeBalance)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeBalanceRepository->update($request, $feeBalance);
    }


    public function delete(FeeBalance $feeBalance)
    {
        return $this->feeBalanceRepository->delete($feeBalance);
    }

}
