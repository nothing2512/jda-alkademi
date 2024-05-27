<?php

namespace App\Http\Controllers;

class UserController extends Controller {

    public function getUser() {
        return session()->get("user");
    }
}