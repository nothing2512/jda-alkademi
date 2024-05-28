<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login() {
        $email = "admin@gmail.com";
        $password = "password";

        $user = User::query()->where("email", "=", $email)->first();
        if ($user == null) {
            return "User tidak ditemukan";
        }

        if (!Hash::check($password, $user->password)) {
            return "Password salah";
        }

        auth()->login($user);

        return $user;
    }

    public function logout() {
        auth()->logout();
        return "Sukses logout";
    }

    public function getLoggedUser() {
        $user = auth()->user();
        if ($user == null) {
            return "Belum login";
        }
        return $user;
    }
}
