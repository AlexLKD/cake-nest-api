<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function() {
    
    $user = User::first();

    auth()->loginUsingId(11);

    // dd(User::all());

    return UserResource::collection(User::paginate(5));
});