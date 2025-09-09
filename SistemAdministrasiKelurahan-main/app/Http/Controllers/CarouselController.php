<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('dashboard.beranda.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('dashboard.beranda.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('public/images/carousel');
        Carousel::create(['image' => $path, 'title' => $request->title]);

        return redirect()->route('carousel.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroy(Carousel $carousel)
    {
        // PERUBAHAN: Cek dulu apakah file ada sebelum dihapus
        if (Storage::exists($carousel->image)) {
            Storage::delete($carousel->image);
        }

        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Gambar berhasil dihapus.');
    }
}

