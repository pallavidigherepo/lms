<?php
namespace App\Repositories\Interfaces;

Interface BatchRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $batch);

    public function delete($batch);

}