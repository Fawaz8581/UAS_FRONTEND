<?php

use Illuminate\Support\Facades\Route;

// Route GET untuk menampilkan form registrasi
Route::get('/register', function () {
    return view('register');
});

// Routes lainnya
Route::get('/', function () {
    return view('index');
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
