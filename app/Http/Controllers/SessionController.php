<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    function globalFunction() {
        $sumResult = sum(1, 3);
        $sayResult = say("Fulan");
        dd([$sumResult, $sayResult]);
    }

    function calculateDate() {
        $currentDate = now(); // sekarang 2024-05-27
        $date = new Carbon("2024-05-26 00:00:00"); // kemaren 2024-05-26
        $date2 = new Carbon("2024-05-28 00:00:00"); // besok 2024-05-28

        $isExpired = $currentDate->diffInMilliseconds($date2) < 0;
        if ($isExpired) {
            // redirect ke halaman expired
            dd("Expired");
            redirect()->route("nama-route"); // naming route / route naming
        } else {
            // redirect ke halaman pembayaran sukses
            dd("Bisa dibayar");
            redirect()->route("nama-route");
        }

        dd([
            $date->diffInDays($currentDate),
            $date->diffInHours($currentDate),
            $date->diffInMinutes($currentDate),
            $currentDate->diffInMilliseconds($date), // kemaren
            $date2->diffInMilliseconds($currentDate), // besok
        ]);
    }

    // database : array [], object {}
    // session : key-value
    public function getName() {
        $name = session()->get("name");
        return $name;
    }

    public function setName() {
        $name = request()->get("name"); // ?name=...
        session()->put("name", $name); // simpan session
        return "Session berhasil disimpan";
    }

    public function clearSession() {
        // session()->forget("name"); // menghapus satuan data
        // session()->put("name", null);
        session()->flush(); // menghapus semua data
        return session()->all();
    }

    public function setUser() {
        session()->put("user", [
            "name" => "Fulan",
            "age" => 21
        ]);
        return "Session berhasil disimpan";
    }
}
