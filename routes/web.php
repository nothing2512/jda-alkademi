<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\WithAuth;
use App\Http\Middleware\WithoutAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [AuthController::class, "login"])->middleware([WithoutAuth::class]);
Route::get("/logout", [AuthController::class, "logout"])->middleware([WithAuth::class]);
Route::get("/user", [AuthController::class, "getLoggedUser"])->middleware([WithAuth::class]);