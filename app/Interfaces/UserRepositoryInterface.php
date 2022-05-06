<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function login(array $userData): bool;
    public function logoutApi(): void;
    public function getAuthUser();
    public function getUserById(int $userId);
    public function getAllUsers();
    public function updateUser(int $userId, array $newDetails);
}
