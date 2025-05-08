<?php
namespace App\Repositories;

use App\Models\InquiryStatus;
use App\Http\Resources\InquiryStatusResource;
use App\Repositories\Interfaces\InquiryStatusRepositoryInterface;
use App\Http\Requests\StoreInquiryStatusRequest;
use App\Http\Requests\UpdateInquiryStatusRequest;

class InquiryStatusRepository implements InquiryStatusRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return InquiryStatusResource::collection(
            InquiryStatus::when($request->input('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
            ];
            $inquiryStatus = InquiryStatus::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Inquiry Status created successfully.',
                'inquiry_status' => $inquiryStatus,
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

    public function update($request, $inquiryStatus)
    {
        
        if ($request->validated()) {
            $inquiryStatus->name = $request->name;

            $inquiryStatus->save();
            $response = [
                'success' => true,
                'message' => 'Inquiry Follow-up Type updated successfully.',
                'inquiry_status' => $inquiryStatus,
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

    public function delete($inquiryStatus)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($inquiryStatus->delete()) {
            $response = [
                'success' => true,
                'message' => 'Batch deleted successfully.',
                'inquiry_status' => $inquiryStatus,
            ];
        }
        return response()->json($response);
    }
}
