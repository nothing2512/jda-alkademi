<?php

use Illuminate\Support\Facades\Route;

Route::post("/post", function() {
    $file = request()->file("file");
    return response()->json($file->extension());
});

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get("/beranda", function() {
    return redirect()->route("admin.detail");
});

Route::get("/home", function() {
    return request()->query();
})->name("home");

// route query : ?id=3
// route parameter : /route/{parameter}

// route : /barang/{id}
// /barang/1 (id = 1)
// /barang/2 (id = 2)
Route::get("/item/{id}", function($id) {
    $barang = [
        [
            "id" => 1,
            "nama" => "Bolpoin",
            "harga" => 2700
        ],
        [
            "id" => 2,
            "nama" => "Buku",
            "harga" => 5000
        ],
        [
            "id" => 3,
            "nama" => "penghapus",
            "harga" => 1000
        ]
    ];

    $result = [];
    foreach ($barang as $b) {
        if ($b["id"] == $id) {
            $result = $b;
        }
    }

    $jumlah = request()->get("jumlah");
    $result["totalHarga"] = $result["harga"] * $jumlah;

    return $result;
})->name("item.detail");

Route::get("/user", function() {
    $users = [
        [
            "id" => 1,
            "name" => "Fulan",
            "age" => 30
        ],
        [
            "id" => 2,
            "name" => "Fulanah",
            "age" => 20
        ]
    ];

    // http://127.0.0.1:8000/detail?id=3&name=Robet&age=17
    // {scheme}://{host}:{port}/{route}?{query}
    // schema : http
    // host : 127.0.0.1
    // port : 8000
    // route : detail
    // query : id=3 & name=Robet & age=17

    // untuk mengambil query
    // request()->get("{key}");

    $id = request()->get("id");

    $result = [];
    foreach ($users as $user) {
        if ($user["id"] == $id) {
            $result = $user;
        }
    }

    if ($result == []) {
        return "data tidak ditemukan";
    }

    return view("user.detail", [
        "user" => $result, // $user,
        "buku" => [
            "id" => 1,
            "name" => "Skripsi"
        ],
        "title" => "Judul", // $title,
        "description" => "<h4>Lorem Ipsum Dolor Sit Amet</h4>" // $description
    ]);
})->name("user.detail");

// middleware
// url : https://alkademi.id
// browser -> server -> menyamakan route -> middleware -> action

// Grouping
// Parent Route
// semua group admin, harus memiliki route /admin di depannya
// contoh: 
//      - {host}/admin/list
//      - {host}/admin/detail
//      - {host}/admin/create
//      - {host}/admin/update
//      - {host}/admin/delete
Route::prefix("/admin")->name("admin.")->group(function() {

    // Child Route
    // {host}/{prefix}/{uri}
    Route::get("/detail", function() {
        return [
            "id" => 1,
            "username" => "admin"
        ];
    })->name("detail"); // admin.detail

});

// Route
// MVC : model-view-controller