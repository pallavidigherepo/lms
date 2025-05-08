<?php
namespace App\Repositories;

use App\Models\InquiryFollowupType;
use App\Http\Resources\InquiryFollowupTypeResource;
use App\Repositories\Interfaces\InquiryFollowupTypeRepositoryInterface;
use App\Http\Requests\StoreInquiryFollowupTypeRequest;
use App\Http\Requests\UpdateInquiryFollowupTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InquiryFollowupTypeRepository implements InquiryFollowupTypeRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return InquiryFollowupTypeResource::collection(
            InquiryFollowupType::when($request->input('search'), function ($query) {
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
            $inquiryFollowupType = InquiryFollowupType::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Inquiry Follow-up Type created successfully.',
                'inquiry_followup_type' => $inquiryFollowupType,
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

    public function update($request, $inquiryFollowupType)
    {
        if ($request->validated()) {
            $inquiryFollowupType->name = $request->name;

            $inquiryFollowupType->save();
            $response = [
                'success' => true,
                'message' => 'Inquiry Follow-up Type updated successfully.',
                'inquiry_followup_type' => $inquiryFollowupType,
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

    public function delete($inquiryFollowupType)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($inquiryFollowupType->delete()) {
            $response = [
                'success' => true,
                'message' => 'Inquiry Follow-up Type deleted successfully.',
                'inquiry_followup_type' => $inquiryFollowupType,
            ];
        }
        return response()->json($response);
    }
}
