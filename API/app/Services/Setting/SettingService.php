<?php
namespace App\Services\Setting;

use App\Http\Requests\StoreSettingRequest;
use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingService
{

    public function __construct(protected SettingRepositoryInterface $settingRepository) { }

    public function all($request)
    {
        return $this->settingRepository->all($request);
    }


    public function create(StoreSettingRequest $request)
    {

        return $this->settingRepository->create($request);
    }

    public function update(Request $request, $setting)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->feeTypeRepository->update($request, $setting);
    }


    public function delete(Setting $setting)
    {
        return $this->settingRepository->delete($setting);
    }

}
