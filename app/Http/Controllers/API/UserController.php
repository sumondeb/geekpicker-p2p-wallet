<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use App\Interfaces\UserRepositoryInterface;

class UserController extends BaseController 
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $userData = $request->only(['email', 'password']);

        if ($this->userRepository->login($userData)) {
            $user = auth()->user();
            $responseData = [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken('P2P-Wallet')->accessToken,
            ];

            return $this->successResponse('User login successfully', $responseData);
        } else {
            return $this->errorResponse('Invalid email or password', ['error'=>'Unauthorised'], 401);
        }
    }

    public function userProfile(): JsonResponse
    {
        $user = $this->userRepository->getAuthUser();

        return $this->successResponse('User Profile', $user->toArray());
    }

    public function logout(): JsonResponse
    {
        $this->userRepository->logoutApi();

        return $this->successResponse('User logged out');
    }
}
