<?php
namespace App\Services\FeeStructure;

use App\Http\Requests\StoreFeeStructureRequest;
use App\Models\FeeStructure;
use App\Repositories\Interfaces\FeeStructureRepositoryInterface;
use Illuminate\Http\Request;

class FeeStructureService
{

    public function __construct(protected FeeStructureRepositoryInterface $feeStructureRepository) { }

    public function all($request)
    {
        return $this->feeStructureRepository->all($request);
    }


    public function create(StoreFeeStructureRequest $request)
    {

        return $this->feeStructureRepository->create($request);
    }

    public function update(Request $request, $feeStructure)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeStructureRepository->update($request, $feeStructure);
    }


    public function delete(FeeStructure $feeStructure)
    {
        return $this->feeStructureRepository->delete($feeStructure);
    }

}
