<?php
namespace App\Repositories\Interfaces;

Interface StudentRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $student);

    public function delete($student);

}