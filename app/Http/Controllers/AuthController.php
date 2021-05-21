<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = $this->userService->create($validated);
        return $user;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('access_token');

            return [
                'token_type' => 'Bearer',
                'token' => $token->plainTextToken
            ];
        }

        return response()->json([
            'message' => 'invalid data'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
