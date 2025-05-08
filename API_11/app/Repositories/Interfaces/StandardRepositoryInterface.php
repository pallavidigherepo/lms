<?php
namespace App\Repositories\Interfaces;

Interface StandardRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $standard);

    public function delete($standard);

}