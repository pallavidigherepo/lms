<?php
namespace App\Repositories\Interfaces;

Interface FeeStudentDiscountRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeStudentDiscount);

    public function delete($feeStudentDiscount);

}