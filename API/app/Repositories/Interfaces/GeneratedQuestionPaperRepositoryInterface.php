<?php
namespace App\Repositories\Interfaces;

Interface GeneratedQuestionPaperRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $generatedQuestionPaper);

    public function delete($generatedQuestionPaper);

}