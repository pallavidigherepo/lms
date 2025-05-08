<?php
namespace App\Services\Fee;

use App\Http\Requests\FeeRequest;
use App\Models\Fee;
use App\Repositories\Interfaces\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeService
{

    public function __construct(protected FeeRepositoryInterface $feeRepository) { }

    public function all($request)
    {
        return $this->feeRepository->all($request);
    }


    public function create(FeeRequest $request)
    {

        return $this->feeRepository->create($request);
    }

    public function update(Request $request, $fee)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeRepository->update($request, $fee);
    }


    public function delete(Fee $fee)
    {
        return $this->feeRepository->delete($fee);
    }

}
