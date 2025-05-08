<?php
namespace App\Repositories\Interfaces;

Interface InquiryRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $inquiry);

    public function delete($inquiry);

}