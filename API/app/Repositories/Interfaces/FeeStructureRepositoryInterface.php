<?php
namespace App\Repositories\Interfaces;

Interface FeeStructureRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $feeStructure);

    public function delete($feeStructure);

}