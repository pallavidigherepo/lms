<?php
namespace App\Repositories\Interfaces;

Interface FeeRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $fee);

    public function delete($fee);

}