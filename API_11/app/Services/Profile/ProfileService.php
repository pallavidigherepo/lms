<?php
namespace App\Services\Profile;

use App\Http\Requests\StoreProfileUserRequest;
use App\Http\Requests\UpdateProfileUserRequest;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
use App\Models\ProfileUser;
use Illuminate\Http\Request;

class ProfileService
{

    public function __construct(protected ProfileRepositoryInterface $profileRepository) { }

    public function all($request)
    {
        return $this->profileRepository->all($request);
    }


    public function create(Request $request): mixed
    {
        if (!$request->validated()) {
            return false;
        }

        return $this->profileRepository->create($request);
    }


    public function update(Request $request, $profile)
    {
        /*if (!$request->validated()) {
            return false;
        }*/

        return $this->profileRepository->update($request, $profile);
    }


}

