<?php
namespace App\Services\FeeStudentDiscount;

use App\Http\Requests\StoreFeeStudentDiscountRequest;
use App\Http\Requests\UpdateFeeStudentDiscountRequest;
use App\Models\FeeStudentDiscount;
use App\Repositories\Interfaces\FeeStudentDiscountRepositoryInterface;
use Illuminate\Http\Request;

class FeeStudentDiscountService
{

    public function __construct(protected FeeStudentDiscountRepositoryInterface $feeStudentDiscountRepository) { }

    public function all($request)
    {
        return $this->feeStudentDiscountRepository->all($request);
    }


    public function create(FeeStudentDiscountRequest $request)
    {

        return $this->feeStudentDiscountRepository->create($request);
    }

    public function update(Request $request, $feeStudentDiscount)
    {
        return $this->feeStudentDiscountRepository->update($request, $feeStudentDiscount);
    }


    public function delete(FeeStudentDiscount $feeStudentDiscount)
    {
        return $this->feeStudentDiscountRepository->delete($feeStudentDiscount);
    }

}
