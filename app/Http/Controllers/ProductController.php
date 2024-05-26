<?php

namespace App\Http\Controllers;

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
}
