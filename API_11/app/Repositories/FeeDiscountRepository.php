<?php
namespace App\Repositories;

use App\Models\FeeDiscount;
use App\Http\Resources\FeeDiscountResource;
use App\Repositories\Interfaces\FeeDiscountRepositoryInterface;
use App\Http\Requests\StoreFeeDiscountRequest;
use App\Http\Requests\UpdateFeeDiscountRequest;

class FeeDiscountRepository implements FeeDiscountRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        return FeeDiscountResource::collection(
            FeeDiscount::when(request('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
            })
            ->orderBy($field, $order)
            ->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $feeDiscount = FeeDiscount::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Fee discount created successfully.',
                'fee_discount' => $feeDiscount,
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

    public function show(FeeDiscount $feeDiscount)
    {
        return new FeeDiscountResource(FeeDiscount::FindOrFail($feeDiscount->id));
    }

    public function update($request, $feeDiscount)
    {
        if ($request->validated()) {
            $feeDiscount->name = $request->name;
            $feeDiscount->amount = $request->amount;

            $feeDiscount->save();
            $response = [
                'success' => true,
                'message' => 'Fee discount updated successfully.',
                'fee_discount' => $feeDiscount,
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

    public function delete($feeDiscount)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($feeDiscount->delete()) {
            $response = [
                'success' => true,
                'message' => 'Fee discount deleted successfully.',
                'fee_discount' => $feeDiscount,
            ];
        }
        return response()->json($response); 
    }
}
