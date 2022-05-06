<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function login(array $userData): bool
    {
        return auth()->attempt($userData);
    }

    public function logoutApi(): void
    {
        auth()->user()->token()->revoke();
    }

    public function getAuthUser()
    {
        return auth()->user();
    }

    public function getUserById(int $userId)
    {
        return User::findOrFail($userId);
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function updateUser(int $userId, array $newDetails)
    {
        return User::whereId($userId)->update($newDetails);
    }
}
