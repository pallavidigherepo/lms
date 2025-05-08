<?php
namespace App\Repositories;

use App\Models\InquiryFollowup;
use App\Http\Resources\InquiryFollowupResource;
use App\Repositories\Interfaces\InquiryFollowupRepositoryInterface;
use App\Http\Requests\StoreInquiryFollowupRequest;
use App\Http\Requests\UpdateInquiryFollowupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InquiryFollowupRepository implements InquiryFollowupRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;
        $inquiry = $request->input('inquiry_id') ?? null;

        return InquiryFollowupResource::collection(
            InquiryFollowup::when($request->input('search'), function ($query) {
                $query->where('inquiry_followup_type_id', 'like', '%' . request('search') . '%');
                $query->where('inquiry_id', '=', request('inquiry_id'));
            })->where('inquiry_id', $inquiry)->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $input = $request->toArray();
            $input['created_by'] = Auth::user()->id;
            $input['updated_by'] = Auth::user()->id;
            $inquiryFollowup = InquiryFollowup::create($input);

            $response = [
                'success' => true,
                'message' => 'Inquiry follow up created successfully.',
                'inquiryFollowup' => $inquiryFollowup,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $request->validated(),
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
        //
    }

    public function update($request, $inquiryFollowup)
    {
        if ($request->validated()) {
            $input = $request->toArray();
            $input['updated_by'] = Auth::user()->id;
            $inquiryFollowup->update($input);

            $response = [
                'success' => true,
                'message' => 'Inquiry followup updated successfully.',
                'inquiry' => $inquiryFollowup,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $request->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function delete($inquiryFollowup)
    {
        //
    }
}
