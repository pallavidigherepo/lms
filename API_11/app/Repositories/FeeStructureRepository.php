<?php
namespace App\Repositories;

use App\Models\FeeStructure;
use App\Http\Resources\FeeStructureResource;
use App\Repositories\Interfaces\FeeStructureRepositoryInterface;
use App\Http\Requests\StoreFeeStructureRequest;
use App\Http\Requests\UpdateFeeStructureRequest;
use Illuminate\Support\Facades\Auth;

class FeeStructureRepository implements FeeStructureRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        return FeeStructureResource::collection(
            FeeStructure::when(request('search'), function ($query) {
                $query->where('standard_id', 'like', '%'. request('search'). '%');
            })
            ->orderBy($field, $order)
            ->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $feeStructure = FeeStructure::create($request->toArray());

            $response = [
                'success' => true,
                'message' => 'Fee structure created successfully.',
                'fee_structure' => new FeeStructureResource(FeeStructure::find($feeStructure->id)),
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
        return new FeeStructureResource(FeeStructure::FindOrFail($feeStructure->id));
    }

    public function update($request, $feeStructure)
    {
        if ($request->validated()) {

            $feeStructure->standard_id = $request->standard_id;
            $feeStructure->batch_id = $request->batch_id;
            $feeStructure->fee_category_id = $request->fee_category_id;
            $feeStructure->amount = $request->amount;
            $feeStructure->updated_by = Auth::user()->id;

            $feeStructure->save();
            $response = [
                'success' => true,
                'message' => 'Fee structure updated successfully.',
                'fee_structure' => new FeeStructureResource(FeeStructure::find($feeStructure->id)),
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

    public function delete($feeStructure)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($feeStructure->delete()) {
            $response = [
                'success' => true,
                'message' => 'Fee structure deleted successfully.',
                'fee_structure' => $feeStructure,
            ];
        }
        return response()->json($response);
    }
}
