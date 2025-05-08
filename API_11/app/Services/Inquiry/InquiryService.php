<?php
namespace App\Services\Inquiry;

use App\Http\Requests\InquiryRequest;
use App\Models\Inquiry;
use App\Repositories\Interfaces\InquiryRepositoryInterface;
use Illuminate\Http\Request;

class InquiryService
{

    public function __construct(protected InquiryRepositoryInterface $inquiryRepository) { }

    public function all($request)
    {
        return $this->inquiryRepository->all($request);
    }


    public function create($request)
    {

        return $this->inquiryRepository->create($request);
    }

    public function show(Inquiry $inquiry): mixed
    {
        if (!$inquiry) {
            return false;
        }
        return $this->inquiryRepository->show($inquiry);
    }

    public function update(Request $request, $inquiry)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->inquiryRepository->update($request, $inquiry);
    }


    public function delete(Inquiry $inquiry)
    {
        return $this->inquiryRepository->delete($inquiry);
    }

}
