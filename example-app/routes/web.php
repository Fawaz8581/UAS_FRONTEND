<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/register', 'register');
Route::post('/api/register', [AuthController::class, 'register']);

// Route untuk tampilan login
Route::get('/login', function () {
    return view('login');
});

// Route untuk login dengan metode POST
Route::post('/login', [AuthController::class, 'login']);

// Setelah login berhasil, arahkan ke halaman index
Route::get('/home', function () {
    return view('home');  // atau sesuai dengan tampilan utama kamu
})->name('home');

Route::get('/api/users', function () {
    return response()->json([
        'username' => session('username', null),
    ]);
});

Route::get('/logout', function () {
    session()->forget('username');
    return redirect('/');
});



// Route lainnya
Route::get('/', function () {
    return view('index');
});

// Route lainnya
Route::get('/home', function () {
    return view('home');
});

Route::get('/cancer', function () {
    return view('cancer');
});

Route::get('/cardiology', function () {
    return view('cardiology');
});

Route::get('/dentistry', function () {
    return view('dentistry');
});

Route::get('/dermatology', function () {
    return view('dermatology');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/neurology', function () {
    return view('neurology');
});

Route::get('/ophthalmology', function () {
    return view('ophthalmology');
});

Route::get('/healthy', function () {
    return view('healthy');
});

Route::get('/angular', function () {
    return view('angular');
});
