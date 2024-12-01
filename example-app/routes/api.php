<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return response()->json(['message' => 'Login successful'], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [AuthController::class, 'getCurrentUser']);

Route::post('/register', [AuthController::class, 'register']);