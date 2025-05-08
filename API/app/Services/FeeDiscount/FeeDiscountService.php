<?php
namespace App\Services\FeeDiscount;

use App\Http\Requests\StoreFeeDiscountRequest;
use App\Models\FeeDiscount;
use App\Repositories\Interfaces\FeeDiscountRepositoryInterface;
use Illuminate\Http\Request;

class FeeDiscountService
{

    public function __construct(protected FeeDiscountRepositoryInterface $feeDiscountRepository) { }

    public function all($request)
    {
        return $this->feeDiscountRepository->all($request);
    }


    public function create(StoreFeeDiscountRequest $request)
    {

        return $this->feeDiscountRepository->create($request);
    }

    public function update(Request $request, $feeDiscount)
    {
        return $this->feeDiscountRepository->update($request, $feeDiscount);
    }


    public function delete(FeeDiscount $feeDiscount)
    {
        return $this->feeDiscountRepository->delete($feeDiscount);
    }

}
