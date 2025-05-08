<?php
namespace App\Repositories\Interfaces;

Interface ProfileRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $profile);

    public function delete($profile);

}