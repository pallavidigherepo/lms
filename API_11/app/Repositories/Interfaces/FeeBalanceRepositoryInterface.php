<?php
namespace App\Repositories\Interfaces;

Interface FeeBalanceRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeBalance);

    public function delete($feeBalance);

}