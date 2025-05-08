<?php
namespace App\Repositories;

use App\Models\FeeStudentDiscount;
use App\Http\Resources\FeeStudentDiscountResource;
use App\Repositories\Interfaces\FeeStudentDiscountRepositoryInterface;
use App\Http\Requests\StoreFeeStudentDiscountRequest;
use App\Http\Requests\UpdateFeeStudentDiscountRequest;

class FeeStudentDiscountRepository implements FeeStudentDiscountRepositoryInterface
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

    public function update($request, $feeStudentDiscount)
    {
    
    }

    public function delete($feeStudentDiscount)
    {
        
    }
}
