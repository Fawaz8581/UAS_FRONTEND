<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;

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

Route::get('/consultations', function () {
    try {
        $consultations = \App\Models\Consultation::getAllConsultations();
        \Log::info('Consultations data:', ['data' => $consultations]); // Untuk debugging
        return response()->json($consultations);
    } catch (\Exception $e) {
        \Log::error('Error fetching consultations: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::post('/consultations', [ConsultationController::class, 'store']);