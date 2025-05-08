<?php
namespace App\Repositories\Interfaces;

Interface BoardRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $board);

    public function delete($board);

}