<?php
namespace App\Services\Batch;

use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use Illuminate\Http\Request;

class BatchService
{

    public function __construct(protected BatchRepositoryInterface $batchRepository) { }

    public function all($request)
    {
        return $this->batchRepository->all($request);
    }


    public function create(BatchRequest $request)
    {

        return $this->batchRepository->create($request);
    }

    public function update(Request $request, $batch)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->batchRepository->update($request, $batch);
    }


    public function delete(Batch $batch)
    {
        return $this->batchRepository->delete($batch);
    }

}
