<?php
namespace App\Repositories\Interfaces;

Interface CourseRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $course);

    public function delete($course);

}