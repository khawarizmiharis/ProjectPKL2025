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
            'description' => 'nullable|string',
        ]);

        // PERBAIKAN: Menyimpan ke disk 'public' dengan path yang benar
        $path = $request->file('image')->store('images/carousel', 'public');

        Carousel::create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('dashboard.carousel.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Carousel $carousel)
    {
        return view('dashboard.beranda.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $path = $carousel->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if (Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }
            // PERBAIKAN: Simpan gambar baru dengan path yang benar
            $path = $request->file('image')->store('images/carousel', 'public');
        }

        $carousel->update([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('dashboard.carousel.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Carousel $carousel)
    {
        // Hapus file dari storage
        if (Storage::disk('public')->exists($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }

        $carousel->delete();
        return redirect()->route('dashboard.carousel.index')->with('success', 'Gambar berhasil dihapus.');
    }
}

