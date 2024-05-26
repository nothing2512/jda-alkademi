<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/category/create", [CategoryController::class, "store"]);
Route::get("/category/list", [CategoryController::class, "index"]);
Route::get("/category/detail/{id}", [CategoryController::class, "show"]);
Route::get("/category/update/{id}", [CategoryController::class, "update"]);
Route::get("/category/delete/{id}", [CategoryController::class, "destroy"]);

Route::get("/products", [ProductController::class, "index"]);