<?php
namespace App\Repositories\Interfaces;

Interface TopicRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $topic);

    public function delete($topic);

    public function list();

}