<?php
namespace App\Services\InquiryFollowupType;

use App\Http\Requests\StoreInquiryFollowupTypeRequest;
use App\Http\Requests\UpdateInquiryFollowupTypeRequest;
use App\Models\InquiryFollowupType;
use App\Repositories\Interfaces\InquiryFollowupTypeRepositoryInterface;
use Illuminate\Http\Request;

class InquiryFollowupTypeService
{

    public function __construct(protected InquiryFollowupTypeRepositoryInterface $inquiryFollowupTypeRepository) { }

    public function all($request)
    {
        return $this->inquiryFollowupTypeRepository->all($request);
    }


    public function create($request)
    {

        return $this->inquiryFollowupTypeRepository->create($request);
    }

    public function show(InquiryFollowupType $inquiryFollowupType): mixed
    {
        if (!$inquiryFollowupType) {
            return false;
        }
        return $this->inquiryFollowupTypeRepository->show($inquiryFollowupType);
    }

    public function update(Request $request, $inquiryFollowupType)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->inquiryFollowupTypeRepository->update($request, $inquiryFollowupType);
    }


    public function delete(InquiryFollowupType $inquiryFollowupType)
    {
        return $this->inquiryFollowupTypeRepository->delete($inquiryFollowupType);
    }

}
