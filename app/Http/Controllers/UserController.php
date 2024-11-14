<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\routing\Controllers\HasMiddleware;
use Illuminate\routing\Controllers\Middleware;

class UserController extends Controller
{
    public static function middleware()
    {
        return New Middleware('auth:sanctum', except: ['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // index function for users api

        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        // for validation errors

        if (User::where('email', $fields['email'])->exists()) {
            return response()->json([
                'message' => 'User already exists'
            ], 409);
        }

        // store function for users api
        $user = New User;
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // show function for users api

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
        ]);

        // Find the user or fail
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = bcrypt($fields['password']);
        $user->save();

        // Return updated user
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        User::destroy($id);

        return 'User Deleted';
    }
}
