<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    // 1. (DDL) di database tidak perlu mendifinisikan relasi (agar data lebih dinamis dan fleksibel)
    // 2. deklarasi relasi cuman di model

    public function products() {
        // one-to-many
        return $this->hasMany(Product::class, "category_id", "id");
    }
}
