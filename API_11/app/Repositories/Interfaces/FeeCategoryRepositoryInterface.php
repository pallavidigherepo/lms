<?php
namespace App\Repositories\Interfaces;

Interface FeeCategoryRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeCategory);

    public function delete($feeCategory);

}