<?php
namespace App\Repositories;

use App\Models\FeeBalance;
use App\Http\Resources\FeeBalanceResource;
use App\Repositories\Interfaces\FeeBalanceRepositoryInterface;
use App\Http\Requests\StoreFeeBalanceRequest;
use App\Http\Requests\UpdateFeeBalanceRequest;

class FeeBalanceRepository implements FeeBalanceRepositoryInterface
{
    public function all($request)
    {
        
    }

    public function create($request)
    {
      
    }

    public function show($id)
    {
        //
    }

    public function update($request, $feeBalance)
    {
    
    }

    public function delete($feeBalance)
    {
        
    }
}
