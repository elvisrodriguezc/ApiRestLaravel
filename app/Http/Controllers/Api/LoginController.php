<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (Auth::attempt($request->only('email', 'password'))) {

            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Successfully logged in.'
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials.'
        ], 401);

    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'name' => 'required',
        ]);
    }
}

