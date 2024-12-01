<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Cari user berdasarkan email
        $user = User::findByEmail($data['email']);
    
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your account is not registered',
            ], 404);
        }
    
        // Verifikasi password
        if (!Hash::check($data['password'], $user['password'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your password does not match',
            ], 401);
        }
    
        // Jika login berhasil
        return redirect('/home'); // Redirect ke halaman utama
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
