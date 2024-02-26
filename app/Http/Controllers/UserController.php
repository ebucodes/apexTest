<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index()
    {
        // Retrieve all users
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'roles' => ['required', Rule::in(['admin', 'user'])],
        ]);

        // Create a new user
        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|string',
            'roles' => ['required', Rule::in(['admin', 'user'])],
        ]);

        // Update the user
        $user->update($validatedData);
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        // Check if authenticated user has admin role
        if (auth()->user()->roles !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Delete the user
        $user->delete();
        return response()->json(null, 204);
    }
}
