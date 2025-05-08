<?php
namespace App\Services\InquirySource;

use App\Http\Requests\InquirySourceRequest;
use App\Models\InquirySource;
use App\Repositories\Interfaces\InquirySourceRepositoryInterface;
use Illuminate\Http\Request;

class InquirySourceService
{

    public function __construct(protected InquirySourceRepositoryInterface $inquirySourceRepository) { }

    public function all($request)
    {
        return $this->inquirySourceRepository->all($request);
    }


    public function create($request)
    {

        return $this->inquirySourceRepository->create($request);
    }

    public function show(InquirySource $inquirySource): mixed
    {
        if (!$inquirySource) {
            return false;
        }
        return $this->inquirySourceRepository->show($inquirySource);
    }

    public function update(Request $request, $inquirySource)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->inquirySourceRepository->update($request, $inquirySource);
    }


    public function delete(InquirySource $inquirySource)
    {
        return $this->inquirySourceRepository->delete($inquirySource);
    }

}
