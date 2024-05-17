<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userValidation;

    function __construct()
    {
        $this->userValidation = [
            "nama" => "required|min:3|max:20",
            "email" => "required|min:7|max:30|unique:users",
            "password" => "required|min:8|max:16",
            "umur" => "required|integer"
        ];
    }

    function getUsers() {
        $users = [
            [
                "id" => 1,
                "name" => "Fulan"
            ],
            [
                "id" => 2,
                "name" => "Fulanah"
            ],
            [
                "id" => 3,
                "name" => "Ahmad"
            ]
        ];

        return view("users", [
            "users" => $users
        ]);
    }

    public function detailUser($id) {
        $users = [
            (object) [
                "id" => 1,
                "name" => "Fulan"
            ],
            (object) [
                "id" => 2,
                "name" => "Fulanah"
            ],
            (object) [
                "id" => 3,
                "name" => "Ahmad"
            ]
        ];

        $user = $users[$id];

        return view("users.detail", [
            "user" => $user
        ]);
    }

    public function create() {
        return view("users.create");
    }

    public function store(Request $request) {
        // nama, email, password, umur
        $validation = $request->validate($this->userValidation);

        $errors = [];

        if (strlen(request()->post("nama")) < 3) {
            array_push($errors, "Nama harus lebih dari 3 karakter");
        }

        return $errors;
    }
}
