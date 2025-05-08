<?php
namespace App\Repositories\Interfaces;

Interface TemplateRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $template);

    public function delete($template);

}