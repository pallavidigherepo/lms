<?php
namespace App\Repositories\Interfaces;

Interface FeeReciptRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeRecipt);

    public function delete($feeRecipt);

}