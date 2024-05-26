<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name"); // varchar
            $table->text("description"); // text
            $table->integer("price")->default(0);
            $table->integer("category_id"); // tabel categories kolom id
            $table->timestamps(); // created_at, updated_at (default : current_timestamp)

            // $table->foreign("category_id")->references("id")->on("categories");
        });

        // product
        // id : 1
        // name : Pensil
        // category_id : 3

        // ambil / select data kategori dengan id 3
        // category
        // id : 3
        // name : ....

        // Query DDL (Data Definition Language) CREATE, ALTER, DROP
        // Query DML (Data Manipulation Language) CRUD, INSERT, SELECT, UPDATE, DELETE

        // Migration : DDL
        // Eloquent / Query Builder : DML
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
