<?php

use App\Http\Controllers\CupcakeController;
use App\Http\Controllers\UserController;
use App\Http\Resources\CupcakeResource;
use App\Http\Resources\UserResource;
use App\Models\Cupcake;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-user', function() {
    $user = User::with('orders')->first();
    // auth()->loginUsingId(11);
    return UserResource::collection(User::with('orders.user')->paginate(5));
});

Route::get('/users', function() {
    return UserResource::collection(User::all());
})->name('users.index');

Route::get('/users/{user}', function(User $user) {
    return new UserResource($user->load('orders'));
})->name('users.show');

Route::post('/users/add', [UserController::class, 'store'])->name('users.add');
Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/cupcakes', function() {
    return CupcakeResource::collection(Cupcake::all());
})->name('cupcakes.index');

Route::get('/cupcakes/{cupcake}', function(Cupcake $cupcake) {
    return new CupcakeResource($cupcake);
})->name('cupcakes.show');

Route::post('/cupcakes/add', [CupcakeController::class, 'store'])->name('cupcakes.add');
Route::put('/cupcakes/update/{cupcake}', [CupcakeController::class, 'update'])->name('cupcakes.update');
Route::delete('/cupcakes/delete/{cupcake}', [CupcakeController::class, 'destroy'])->name('cupcakes.destroy');
