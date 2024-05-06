<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/register', [UserController::class, 'register']);
Route::get('/login',[UserController::class, 'login'])->name('login');

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);