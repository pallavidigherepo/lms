<?php
namespace App\Repositories\Interfaces;

Interface StudentPaperRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $studentPaper);

    public function delete($studentPaper);

}