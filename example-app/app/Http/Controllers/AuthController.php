<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data input
        $data = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Simpan password hashed dan asli
        $dataToInsert = [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),  
            'password_plain' => $data['password'],   
        ];

        // Panggil fungsi createUser untuk menyimpan data ke database
        $userId = User::createUser($dataToInsert);

        // Respons sukses setelah berhasil registrasi
        return response()->json(['message' => 'Registration successful', 'userId' => (string) $userId], 201);
    }
}
