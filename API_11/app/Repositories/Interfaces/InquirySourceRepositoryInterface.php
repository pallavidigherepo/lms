<?php
namespace App\Repositories\Interfaces;

Interface InquirySourceRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $inquirySource);

    public function delete($inquirySource);

}