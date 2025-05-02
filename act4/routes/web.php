<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/upload", [PhotoController::class, "create"])->name("create");
Route::post("/uploadS", [PhotoController::class, "storeSingle"])->name("storeSingle");
Route::post("/uploadM", [PhotoController::class, "storeMultiple"])->name("storeMultiple");
Route::post("/photos/delete", [PhotoController::class, "delete"])->name("delete");