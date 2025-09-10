<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillageIdentity;

class VillageProfileController extends Controller
{
    public function strukturPemerintahan()
    {
        return view('visitors.profil_kelurahan.struktur-pemerintahan');
    }

    // Gabungan (lama, kalau masih dipakai)
    public function sejarahVisiMisi()
    {
        $villageIdentity = VillageIdentity::first();
        return view('visitors.profil_kelurahan.sejarah-visi-misi', compact('villageIdentity'));
    }

    // Baru: khusus halaman Sejarah
    public function sejarah()
    {
        $villageIdentity = VillageIdentity::first();
        return view('visitors.profil_kelurahan.sejarah', compact('villageIdentity'));
    }

    // Baru: khusus halaman Visi & Misi
    public function visiMisi()
    {
        $villageIdentity = VillageIdentity::first();
        return view('visitors.profil_kelurahan.visi-misi', compact('villageIdentity'));
    }
}