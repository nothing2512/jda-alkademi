<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan halaman daftar kategori
     * nama route : category.index
     * view : category.index
     */
    public function index()
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Horror"
            ],
            [
                "id" => 2,
                "name" => "Romance"
            ],
            [
                "id" => 3,
                "name" => "action"
            ]
        ];

        return view("category.index", [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan halaman form untuk membuat kategori
     * category.create
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     * Sistem untuk menambahkan data kategori
     * category.store
     */
    public function store(Request $request)
    {
        $namaKategori = $request->namaKategori;
        $name = request()->post("namaKategori");
        $name2 = $request->get("namaKategori");
        dd([
            $name,
            $namaKategori,
            $name2
        ]);
    }

    /**
     * Display the specified resource.
     * Menampilkan halaman detail kategori
     * category.show
     */
    public function show(string $id)
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Horror"
            ],
            [
                "id" => 2,
                "name" => "Romance"
            ],
            [
                "id" => 3,
                "name" => "action"
            ]
        ];

        $category = [];

        foreach ($categories as $item) {
            if ($item["id"] == $id) {
                $category = $item;
            }
        }

        return view("category.show", [
            "category" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan halaman form untuk mengubah kategori
     * category.edit
     */
    public function edit(string $id)
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Horror"
            ],
            [
                "id" => 2,
                "name" => "Romance"
            ],
            [
                "id" => 3,
                "name" => "action"
            ]
        ];

        $category = [];

        foreach ($categories as $item) {
            if ($item["id"] == $id) {
                $category = $item;
            }
        }

        return view("category.edit", [
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Sistem untuk mengubah data kategori
     * category.update
     */
    public function update(Request $request, $id)
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Horror"
            ],
            [
                "id" => 2,
                "name" => "Romance"
            ],
            [
                "id" => 3,
                "name" => "action"
            ]
        ];

        foreach ($categories as $key => $value) {
            if ($value["id"] == $id) {
                $categories[$key]["name"] = request()->post("namaKategori");
            }
        }

        return $categories;
    }

    /**
     * Remove the specified resource from storage.
     * Sistem untuk menghapus data kategori
     * category.destroy
     */
    public function destroy($id)
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Horror"
            ],
            [
                "id" => 2,
                "name" => "Romance"
            ],
            [
                "id" => 3,
                "name" => "action"
            ]
        ];

        foreach ($categories as $key => $value) {
            if ($value["id"] == $id) {
                array_splice($categories, $key, 1);
                // unset($categories[$key]);
            }
        }

        return $categories;
    }

    public function search() {
        //
    }
}
