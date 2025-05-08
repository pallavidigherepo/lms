<?php
namespace App\Repositories;

use App\Models\Setting;
use App\Http\Resources\SettingResource;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Auth;

class SettingRepository implements SettingRepositoryInterface
{
    public function all($request)
    {
        //
    }

    public function create($request)
    {
     //
    }

    public function show($id)
    {
        //
    }

    public function update($request, $setting)
    {
       //
    }

    public function delete($setting)
    {
       //
    }
}
