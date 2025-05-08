<?php
namespace App\Repositories;

use App\Models\Fee;
use App\Http\Resources\FeeResource;
use App\Repositories\Interfaces\FeeRepositoryInterface;
use App\Http\Requests\FeeRequest;

class FeeRepository implements FeeRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        return FeeResource::collection(
                Fee::when(request('search'), function ($query) {
                    $query->where('standard_id', 'like', '%'. request('search'). '%');
                })
                ->orderBy($field, $order)
                ->paginate($perPage)
        );
    }

    public function create($request)
    {
      
    }

    public function show($id)
    {
        //
    }

    public function update($request, $fee)
    {
    
    }

    public function delete($fee)
    {
        
    }
}
