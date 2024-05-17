<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function() {
    Route::get("/users", "getUsers");
    Route::get("/user/create", "create");
    Route::get("/user/{id}", "detailUser");
    Route::post("/user", "store")->name("users.store");
});

Route::resource("category", CategoryController::class);

Route::get("/category/search", [CategoryController::class, "search"]);

Route::get("/file/create", [FileController::class, "create"]);
Route::post("/file", [FileController::class, "upload"])->name("file.store");