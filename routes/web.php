<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/global", [SessionController::class, "globalFunction"]);
Route::get("/calculate/date", [SessionController::class, "calculateDate"]);
Route::get("/session/get", [SessionController::class, "getName"]);
Route::get("/session/set", [SessionController::class, "setName"]);
Route::get("/session/clear", [SessionController::class, "clearSession"]);

Route::get("/user/set", [SessionController::class, "setUser"]);
Route::get("/user/get", [UserController::class, "getUser"]);

Route::get("/setSession", function() {
    session([
        "nama" => "Andre",
        "umur" => 17
    ]);
    session()->put("name", "Fulan");
    return "Session berhasil disimpan";
});

Route::get("/getSession", function() {
    return [
        "nama" => session()->get("nama"),
        "umur" => session()->get("umur"),
        "name" => session()->get("name"),
    ];
});

Route::get("/login", function() {
    session()->put("isLoggedIn", true);
    return "Login";
});

Route::get("/logout", function() {
    session()->put("isLoggedIn", false);
    return "Logout";
});

Route::get("/check/login", function() {
    $isLoggedIn = session()->get("isLoggedIn") == true;
    if ($isLoggedIn) {
        return "Logged In";
    } else {
        return "Logged Out";
    }
});