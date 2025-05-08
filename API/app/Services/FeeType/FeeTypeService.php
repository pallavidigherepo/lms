<?php
namespace App\Services\FeeType;

use App\Http\Requests\StoreFeeTypeRequest;
use App\Models\FeeType;
use App\Repositories\Interfaces\FeeTypeRepositoryInterface;
use Illuminate\Http\Request;

class FeeTypeService
{

    public function __construct(protected FeeTypeRepositoryInterface $feeTypeRepository) { }

    public function all($request)
    {
        return $this->feeTypeRepository->all($request);
    }


    public function create(StoreFeeTypeRequest $request)
    {

        return $this->feeTypeRepository->create($request);
    }

    public function update(Request $request, $feeType)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeTypeRepository->update($request, $feeType);
    }


    public function delete(FeeType $feeType)
    {
        return $this->feeTypeRepository->delete($feeType);
    }

}
