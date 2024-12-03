<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;

   Route::post('/consultations', [ConsultationController::class, 'store'])->name('consultations.store');

// Tambahkan rute baru untuk menghapus akun
Route::post('/delete-account', [UserController::class, 'deleteAccount'])->name('delete-account');

Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');

Route::post('/change-email', [UserController::class, 'changeEmail'])->name('change-email');

Route::post('/change-username', [UserController::class, 'changeUsername'])->name('change-username');

Route::post('/change-profile-image', [UserController::class, 'changeProfileImage'])->name('change-profile-image');

Route::post('/remove-profile-image', [UserController::class, 'removeProfileImage'])->name('remove-profile-image');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});

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


Route::get('/settings', function () {
    return view('settings');
});

Route::get('/consultation', function () {
    return view('consultation');
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
