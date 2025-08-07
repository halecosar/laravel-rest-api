<?php

namespace App\Modules\User\Repositories;

use App\Models\users;
use App\Modules\User\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return users::create($data);
    }

    public function findById($id)
    {
        return users::find($id);
    }

    public function update($id, array $data)
    {
        $user = users::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id)
    {
        $user = users::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
