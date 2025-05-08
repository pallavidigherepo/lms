<?php
namespace App\Repositories;

use App\Models\InquirySource;
use App\Http\Resources\InquirySourceResource;
use App\Repositories\Interfaces\InquirySourceRepositoryInterface;
use App\Http\Requests\StoreInquirySourceRequest;
use App\Http\Requests\UpdateInquirySourceRequest;

class InquirySourceRepository implements InquirySourceRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return InquirySourceResource::collection(
            InquirySource::when($request->input('search'), function ($query) {
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
            $inquirySource = InquirySource::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Inquiry Source created successfully.',
                'inquiry_source' => $inquirySource,
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

    public function update($request, $inquirySource)
    {
        
        if ($request->validated()) {
            $inquirySource->name = $request->name;

            $inquirySource->save();
            $response = [
                'success' => true,
                'message' => 'Inquiry Follow-up Type updated successfully.',
                'inquiry_source' => $inquirySource,
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

    public function delete($inquirySource)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($inquirySource->delete()) {
            $response = [
                'success' => true,
                'message' => 'Batch deleted successfully.',
                'inquiry_source' => $inquirySource,
            ];
        }
        return response()->json($response);
    }
}
