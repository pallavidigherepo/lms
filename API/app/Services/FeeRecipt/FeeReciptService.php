<?php
namespace App\Services\FeeRecipt;

use App\Http\Requests\StoreFeeReciptRequest;
use App\Http\Requests\UpdateFeeReciptRequest;
use App\Models\FeeRecipt;
use App\Repositories\Interfaces\FeeReciptRepositoryInterface;
use Illuminate\Http\Request;

class FeeReciptService
{

    public function __construct(protected FeeReciptRepositoryInterface $feeReciptRepository) { }

    public function all($request)
    {
        return $this->feeReciptRepository->all($request);
    }


    public function create(FeeReciptRequest $request)
    {

        return $this->feeReciptRepository->create($request);
    }

    public function update(Request $request, $feeRecipt)
    {
        return $this->feeReciptRepository->update($request, $feeRecipt);
    }


    public function delete(FeeRecipt $feeRecipt)
    {
        return $this->feeReciptRepository->delete($feeRecipt);
    }

}
