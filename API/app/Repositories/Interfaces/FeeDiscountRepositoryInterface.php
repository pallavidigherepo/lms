<?php
namespace App\Repositories\Interfaces;

Interface FeeDiscountRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeDiscount);

    public function delete($feeDiscount);

}