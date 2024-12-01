<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller; // Tambahkan ini
use Illuminate\Http\Request; // Untuk memastikan class Request juga ada

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil user dari session
        $user = $request->session()->get('user');

        // Kirim data user ke view
        return view('home', ['user' => $user]);
    }
}
