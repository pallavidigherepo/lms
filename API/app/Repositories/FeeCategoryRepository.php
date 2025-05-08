<?php
namespace App\Repositories;

use App\Models\FeeCategory;
use App\Http\Resources\FeeCategoryResource;
use App\Repositories\Interfaces\FeeCategoryRepositoryInterface;
use App\Http\Requests\FeeCategoryRequest;

class FeeCategoryRepository implements FeeCategoryRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        return FeeCategoryResource::collection(
            FeeCategory::when(request('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
            })
            ->orderBy($field, $order)
            ->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $feeCategory = FeeCategory::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Fee category created successfully.',
                'fee_category' => $feeCategory,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
        return new FeeCategoryResource(FeeCategory::FindOrFail($feeCategory->id));
    }

    public function update($request, $feeCategory)
    {
        if ($request->validated()) {
            $feeCategory->name = $request->name;

            $feeCategory->save();
            $response = [
                'success' => true,
                'message' => 'Fee category updated successfully.',
                'fee_category' => $feeCategory,
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

    public function delete($feeCategory)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($feeCategory->delete()) {
            $response = [
                'success' => true,
                'message' => 'Fee category deleted successfully.',
                'fee_category' => $feeCategory,
            ];
        }
        return response()->json($response);
    }
}
