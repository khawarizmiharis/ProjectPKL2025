<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPublikController extends Controller
{
    // Menampilkan form pengaduan
    public function formPengaduan()
    {
        return view('visitors.pengaduan.form');
    }
}
