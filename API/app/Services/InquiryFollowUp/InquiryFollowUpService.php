<?php
namespace App\Services\InquiryFollowup;

use App\Http\Requests\StoreInquiryFollowupRequest;
use App\Http\Requests\UpdateInquiryFollowupRequest;
use App\Models\InquiryFollowup;
use App\Repositories\Interfaces\InquiryFollowupRepositoryInterface;
use Illuminate\Http\Request;

class InquiryFollowupService
{

    public function __construct(protected InquiryFollowupRepositoryInterface $inquiryFollowupRepository) { }

    public function all($request)
    {
        return $this->inquiryFollowupRepository->all($request);
    }


    public function create($request)
    {

        return $this->inquiryFollowupRepository->create($request);
    }

    public function show(InquiryFollowup $inquiryFollowup): mixed
    {
        if (!$inquiryFollowup) {
            return false;
        }
        return $this->inquiryFollowupRepository->show($inquiryFollowup);
    }

    public function update(Request $request, $inquiryFollowup)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->inquiryFollowupRepository->update($request, $inquiryFollowup);
    }


    public function delete(InquiryFollowup $inquiryFollowup)
    {
        // return $this->inquiryRepository->delete($inquiry);
    }

}
