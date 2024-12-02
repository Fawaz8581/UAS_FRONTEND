<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; // Untuk memastikan class Request juga ada


class Controller extends BaseController
{
    // Jika ada fungsi global, tambahkan di sini
}

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


