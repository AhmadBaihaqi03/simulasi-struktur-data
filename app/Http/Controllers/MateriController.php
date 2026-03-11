<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

class MateriController extends Controller
{
    public function show($slug)
    {
        if (View::exists("materi.$slug")) {
            return view("materi.$slug");
        }
        // Jika tidak ada, tampilkan 404
        abort(404, "Bolo, file materi.$slug tidak ditemukan di folder resources/views/materi/");
    }
}