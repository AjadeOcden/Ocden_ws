<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [StudentController::class, "registerForm"])->name("registerForm");
Route::post('register', [StudentController::class, "registerStudent"])->name("registerStudent");

Route::get('index', [StudentController::class, "index"])->name("index");
Route::get('receipt', [StudentController::class, "receipt"])->name("receipt");

Route::get('login', [StudentController::class, "loginForm"])->name("loginForm");
Route::post('login', [StudentController::class, "loginStudent"])->name("loginStudent");
Route::post('logout', [StudentController::class, "logout"])->name("logout");

Route::get('edit/{id}', [StudentController::class, "editForm"])->name("editForm");
Route::post('editStudent', [StudentController::class, "editStudent"])->name("editStudent");

Route::get('delete/{id}', [StudentController::class, "delete"])->name("delete");


Route::get('/dashboard', [DashboardController::class, 'index']);
