<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()
            ->get(); // ambil data berupa list
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::query()->create([
            "name" => request()->post("name")
        ]);
        // Menambahkan data / INSERT
        Category::query()->create([
            "name" => "Elektronik"
        ]);

        Category::query()->create([
            "name" => "Alat Mandi"
        ]);

        Category::query()->create([
            "name" => "Alat Makan"
        ]);

        return "Data Berhasil Ditambah";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data satuan berdasarkan id
        $category = Category::query() // FROM category
            ->where("id", "=", $id) // WHERE id = ?
            ->first(); // SELECT * , LIMIT 1

        $products = $category->products;
        // looping products 
        // - get jenis_product

        // SELECT * FROM categories WHERE id = 1 LIMIT 1
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request / request()
        // HttpRequest :
        // - URL
        // - Route
        // - Body
        // - Headers
        $category = Category::query() // FROM category
            ->where("id", "=", $id) // WHERE id = ?
            ->first(); // SELECT * , LIMIT 1

        if ($category == null) {
            return "Kategori tidak ditemukan";
        }

        $category->fill([
            "name" => $request->post("name")
        ]);
        $category->save(); // Save Data

        return "Kategori berhasil diubah";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::query() // FROM category
            ->where("id", "=", $id) // WHERE id = ?
            ->first(); // SELECT * , LIMIT 1

        if ($category == null) {
            return "Kategori tidak ditemukan";
        }

        $category->delete();

        return "Kategori berhasil dihapus";
    }
}
