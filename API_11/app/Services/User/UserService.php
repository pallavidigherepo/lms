<?php
namespace App\Services\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserService
{

    public function __construct(protected UserRepositoryInterface $userRepository) { }

    public function all($request)
    {
        return $this->userRepository->all($request);
    }


    public function create($request): mixed
    {
        return $this->userRepository->create($request);
    }

    public function edit(User $user): mixed
    {
        if (!$user) {
            return false;
        }
        return $this->userRepository->getInfo($user);
    }

    public function update(UserRequest $request, $user)
    {
        if (!$request->validated()) {
            return false;
        }

        return $this->userRepository->update($request, $user);
    }

    public function show(User $user): mixed
    {
        if (!$user) {
            return false;
        }
        return $this->userRepository->getInfo($user);
    }
    public function destroy(User $user): mixed
    {
        if (!$user) {
            return false;
        }

        return $this->userRepository->delete($user);
    }
}

