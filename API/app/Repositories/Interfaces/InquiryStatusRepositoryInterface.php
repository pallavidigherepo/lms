<?php
namespace App\Repositories\Interfaces;

Interface InquiryStatusRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $inquiryStatus);

    public function delete($inquiryStatus);

}