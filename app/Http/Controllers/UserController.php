<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|',
            'password' => 'required|string',
            'is_admin' => 'required|boolean'
        ]);

        $user = User::create($validatedData);
        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function update(Request $request,User $user)

    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|',
            'password' => 'sometimes|string',
            'is_admin' => 'sometimes|boolean'
        ]);

        $user->update($validated);
        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function destroy(User $user)
    {   
        $user->delete();
        return UserResource::make($user);
    }
}
