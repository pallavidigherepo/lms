<?php
namespace App\Repositories\Interfaces;

Interface InquiryFollowupRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $inquiryFollowup);

    public function delete($inquiryFollowup);

}