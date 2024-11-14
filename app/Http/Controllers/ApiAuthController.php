<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register()
    {
        //

        $fields = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = bcrypt($fields['password']);
        $user->save();

        $token = $user->createToken($user->name)->plainTextToken;
        return [
            'message' => 'User created',
            'user' => $user,
            'token' => $token
        ];
    }

    public function login()
    {
        //

        $fields = request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ]);
        }

        $token = $user->createToken($fields['email'])->plainTextToken;

        $response = [
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(user $user)
    {
        //

        $user->tokens()->delete();

        if ($user->tokens->isNotEmpty()) {
            return response([
                'message' => 'Logout failed'
            ]);
        }

        return [
            'message' => 'Logged out successfully'
        ];
    }
}
