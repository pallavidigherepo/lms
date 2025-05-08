<?php
namespace App\Repositories\Interfaces;

Interface SettingRepositoryInterface {

    public function all($request);

    public function create($data);

    public function show($data);

    public function update($data, $setting);

    public function delete($setting);

}