<?php
namespace App\Repositories\Interfaces;

Interface SubjectRepositoryInterface {

    public function all($request);

    public function create($data);

    public function edit($data);

    public function show($data);

    public function update($data, $subject);

    public function delete($subject);

}