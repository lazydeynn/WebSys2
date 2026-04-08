<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'showLogin']);
Route::get('/login', [StudentController::class, 'showLogin']);
Route::post('/login', [StudentController::class, 'login']);
Route::get('/register', [StudentController::class, 'showRegister']);
Route::post('/register', [StudentController::class, 'register']);

Route::get('/profile', [StudentController::class, 'showProfile']);
Route::post('/profile', [StudentController::class, 'updateProfile']);
Route::post('/logout', [StudentController::class, 'logout']);
