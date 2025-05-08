<?php
namespace App\Repositories;

use App\Models\FeeType;
use App\Http\Resources\FeeTypeResource;
use App\Repositories\Interfaces\FeeTypeRepositoryInterface;
use App\Http\Requests\StoreFeeTypeRequest;
use App\Http\Requests\UpdateFeeTypeRequest;
use Illuminate\Support\Facades\Auth;

class FeeTypeRepository implements FeeTypeRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        return FeeTypeResource::collection(
            FeeType::when(request('search'), function ($query) {
                $query->where('name', 'like', '%'. request('search'). '%');
            })
            ->orderBy($field, $order)
            ->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $feeType = FeeType::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Fee type created successfully.',
                'fee_type' => $feeType,
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
        return new FeeTypeResource(FeeType::FindOrFail($feeType->id));
    }

    public function update($request, $feeType)
    {
        if ($request->validated()) {
            $feeType->name = $request->name;
            $feeType->updated_by = Auth::user()->id;

            $feeType->save();
            $response = [
                'success' => true,
                'message' => 'Fee Type updated successfully.',
                'fee_type' => $feeType,
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

    public function delete($feeType)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($feeType->delete()) {
            $response = [
                'success' => true,
                'message' => 'Fee type deleted successfully.',
                'fee_type' => $feeType,
            ];
        }
        return response()->json($response);
    }
}
