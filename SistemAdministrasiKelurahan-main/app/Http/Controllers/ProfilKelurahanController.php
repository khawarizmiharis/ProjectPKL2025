<?php

namespace App\Http\Controllers;

use App\sejarahvisimisi;
use Illuminate\Http\Request;

class ProfilKelurahanController extends Controller
{
    public function index()
    {
        return view('visitors.profil_kelurahan.index', ['sejarahvisimisi' => sejarahvisimisi::take(1)->latest()->get()]);
    }
}
