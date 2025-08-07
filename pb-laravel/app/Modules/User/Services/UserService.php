<?php

namespace App\Modules\User\Services;

use App\Modules\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }

    public function findUserById(int $id)
    {
        return $this->userRepository->findById($id);
    }
    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
