<?php
namespace App\Repositories\Interfaces;

Interface FeeTransactionRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeTransaction);

    public function delete($feeTransaction);

}