<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class FileController extends Controller {

    function upload() {

        request()->validate([
            "gambar" => 'required|max:2048|mimes:jpeg,bmp,png',
            "berkas" => 'mimes:pdf|max:10240',
            "image" => [
                'required',
                File::types(["jpeg", "bmp", "png"])
                    ->min('1mb')
                    ->max('5mb')
            ],
            "password" => [
                'required',
                Password::min(8) // min 8 karakter
                    ->max(16) // max 16 karakter
                    ->letters() // min 1 huruf
                    ->mixedCase() // min ada huruf besar dan kecel
                    ->numbers() // min 1 angka
                    ->symbols() // min 1 simbol
            ]
        ]);

        $gambar = request()->file("gambar"); // file gambar
        $extenstion = $gambar->extension(); // png, jpg, webp
        $filename = uniqid() . "." . $extenstion;
        $gambar->move("upload/", $filename);

        $uriGambar = "upload/" . $filename;
        dd($uriGambar);
    }

    function create() {
        return view("file.create");
    }
}