<?php
namespace App\Repositories;

use App\Models\Batch;
use App\Http\Resources\BatchResource;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use App\Http\Requests\BatchRequest;

class BatchRepository implements BatchRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return BatchResource::collection(
            Batch::when($request->input('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
                //$query->orWhere('description', 'like', '%' . request('search') . '%');
                //$query->orWhere('icon', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
                'is_active'=> $request->is_active ?: !$request->is_active,
            ];
            $batch = Batch::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Batch created successfully.',
                'batch' => $batch,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response);
    }

    public function show($id)
    {
        //
    }

    public function update($request, $batch)
    {
        if ($request->validated()) {
            $batch->name = $request->name;
            $batch->is_active = $request->is_active ?: !$request->is_active;

            $batch->save();
            $response = [
                'success' => true,
                'message' => 'Batch updated successfully.',
                'batch' => $batch,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response);
    }

    public function delete($batch)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($batch->delete()) {
            $response = [
                'success' => true,
                'message' => 'Batch deleted successfully.',
                'batch' => $batch,
            ];
        }
        return response()->json($response);
    }
}
