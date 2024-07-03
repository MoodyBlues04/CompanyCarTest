<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(LoginRequest $request): User
    {
        if(!Auth::guard('api')->attempt($request->only(['name', 'password']))){
            throw new \InvalidArgumentException('Invalid name or password');
        }

        /** @var User */
        return User::query()->where('name', $request->name)->first();
    }
}
