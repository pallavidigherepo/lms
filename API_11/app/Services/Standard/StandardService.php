<?php
namespace App\Services\Standard;

use App\Http\Requests\StandardRequest;
use App\Models\Standard;
use App\Repositories\Interfaces\StandardRepositoryInterface;
use Illuminate\Http\Request;

class StandardService
{

    public function __construct(protected StandardRepositoryInterface $standardRepository) { }

    public function all($request)
    {
        return $this->standardRepository->all($request);
    }


    public function create(StandardRequest $request)
    {

        return $this->standardRepository->create($request);
    }

    public function update(Request $request, $standard)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->standardRepository->update($request, $standard);
    }


    public function delete(Standard $standard)
    {
        return $this->standardRepository->delete($standard);
    }

}
