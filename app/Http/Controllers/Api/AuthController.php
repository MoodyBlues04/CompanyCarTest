<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $this->authService->login($request);

        return response()->json([
            'ok' => true,
            'data' => [
                'message' => 'logged in',
                'token' => $user->makeToken(),
            ],
        ]);
    }
}
