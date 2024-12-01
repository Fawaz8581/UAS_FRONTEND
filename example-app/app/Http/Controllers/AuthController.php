<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::findByEmail($data['email']);

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'Your account is not registered',
        ], 404);
    }

    if (!Hash::check($data['password'], $user['password'])) {
        return response()->json([
            'status' => 'error',
            'message' => 'Your password does not match',
        ], 401);
    }

    session(['user' => (array) $user]);

    // Arahkan ke halaman home
    return redirect('/home');
}


    public function register(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Simpan user baru
        $userId = User::createUser($data);

        return response()->json([
            'message' => 'Registration successful',
            'userId' => (string) $userId,
        ], 201);
    }
}
