<?php
namespace App\Repositories;

use App\Models\FeeRecipt;
use App\Http\Resources\FeeReciptResource;
use App\Repositories\Interfaces\FeeReciptRepositoryInterface;
use App\Http\Requests\StoreFeeReciptRequest;
use App\Http\Requests\UpdateFeeReciptRequest;

class FeeReciptRepository implements FeeReciptRepositoryInterface
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

    public function update($request, $feeRecipt)
    {
    
    }

    public function delete($feeRecipt)
    {
        
    }
}
