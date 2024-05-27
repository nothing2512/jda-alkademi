<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index() {
        // SELECT 
        //     products.id,
        //     products.name,
        //     categories.name as category
        // FROM products
        // JOIN categories ON categories.id = products.category_id
        $products = DB::table("products")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->get([
                "products.id",
                "products.name",
                "categories.name as category"
            ]);
        Product::getList();
        DB::raw("SELECT * FROM products");
        return $products;
    }

    // get detail product dengan kategori
    function show($id) {
        // first() = mengambil 1 data pertama

        // products 
        // - pensil
        // - bolpoin
        // - buku

        $product = Product::query()->where("id", "=", $id)->first();
        // product :
        // - id
        // - name
        // - category_id

        // Get category by category_id on product
        $category = Category::query()->where("id", "=", $product->category_id)->first();

        return [
            "product" => $product,
            "category" => $category
        ];
    }

    function detail($id) {
        $product = Product::query()->where("id", "=", $id)->first();
        $product->category;
        return $product;
    }

    function getData($id) {
        $product = Product::query()->where("id", "=", $id)->first();
        return $product;
    }

    function a() {

    }

    function b() {
        // panggil function a ?
    }
}
