<?php
namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface {

    public function all($request);

    public function create($data);

    public function update($data, $user);

    public function delete($user);
}