<?php
namespace App\Repositories\Interfaces;

Interface ChapterRepositoryInterface {

    public function all($request);

    public function create($data);

    public function edit($data);

    public function show($data);

    public function update($data, $chapter);

    public function delete($chapter);

}