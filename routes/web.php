<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get("/classes", [UserController::class, 'classes'])->middleware('auth');
Route::get("/classes/{class}", [UserController::class, 'class'])->name('class.show')->middleware('auth');

Route::get('/register', [UserController::class, 'register']);
Route::get('/login',[UserController::class, 'login'])->name('login');

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);


Route::get("/sessions", [ClassesController::class, 'sessions'])->middleware('auth');
Route::get("/attendance/{class}", [AttendanceController::class, 'class'])->name('attendance.show')->middleware('auth');