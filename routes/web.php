<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Show the sign-up page
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');


Route::post('/register', [RegisterController::class, 'register']);

//Login Page
Route::get('/login', function () {
    return view('auth.login');
});

//Dashboard page
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return "<h1>Welcome to your Dashboard! You are logged in.</h1>";
});

Route::get('/test', function () {
    return "The routes are working perfectly!";
});

