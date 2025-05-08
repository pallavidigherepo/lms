<?php
namespace App\Repositories\Interfaces;

Interface FeeTypeRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeType);

    public function delete($feeType);

}