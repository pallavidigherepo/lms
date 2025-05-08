<?php
namespace App\Services\FeeCategory;

use App\Http\Requests\StoreFeeCategoryRequest;
use App\Models\FeeCategory;
use App\Repositories\Interfaces\FeeCategoryRepositoryInterface;
use Illuminate\Http\Request;

class FeeCategoryService
{

    public function __construct(protected FeeCategoryRepositoryInterface $feeCategoryRepository) { }

    public function all($request)
    {
        return $this->feeCategoryRepository->all($request);
    }


    public function create(StoreFeeCategoryRequest $request)
    {

        return $this->feeCategoryRepository->create($request);
    }

    public function update(Request $request, $feeCategory)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeCategoryRepository->update($request, $feeCategory);
    }


    public function delete(FeeCategory $feeCategory)
    {
        return $this->feeCategoryRepository->delete($feeCategory);
    }

}
