<?php
namespace App\Services\InquiryStatus;

use App\Http\Requests\StoreInquiryStatusRequest;
use App\Http\Requests\UpdateInquiryStatusRequest;
use App\Models\InquiryStatus;
use App\Repositories\Interfaces\InquiryStatusRepositoryInterface;
use Illuminate\Http\Request;

class InquiryStatusService
{

    public function __construct(protected InquiryStatusRepositoryInterface $inquiryStatusRepository) { }

    public function all($request)
    {
        return $this->inquiryStatusRepository->all($request);
    }


    public function create($request)
    {

        return $this->inquiryStatusRepository->create($request);
    }

    public function show(InquiryStatus $inquiryStatus): mixed
    {
        if (!$inquiryStatus) {
            return false;
        }
        return $this->inquiryStatusRepository->show($inquiryStatus);
    }

    public function update(Request $request, $inquiryStatus)
    {
        return $this->inquiryStatusRepository->update($request, $inquiryStatus);
    }


    public function delete(InquiryStatus $inquiryStatus)
    {
        return $this->inquiryStatusRepository->delete($inquiryStatus);
    }

}
