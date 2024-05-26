<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "category_id"
    ];

    static function getList() {
        return DB::table("products")
        ->rightJoin("categories", "categories.id", "=", "products.category_id")
        ->get([
            "products.id",
            "products.name",
            "categories.name as category"
        ]);
    }
}
