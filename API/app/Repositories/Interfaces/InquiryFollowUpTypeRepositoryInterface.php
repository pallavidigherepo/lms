<?php
namespace App\Repositories\Interfaces;

Interface InquiryFollowupTypeRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $inquiryFollowupType);

    public function delete($inquiryFollowupType);

}