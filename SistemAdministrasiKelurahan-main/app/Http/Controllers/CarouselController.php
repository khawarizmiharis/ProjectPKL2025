<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Menampilkan halaman daftar carousel.
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('dashboard.beranda.carousel.index', compact('carousels'));
    }

    /**
     * Menampilkan formulir untuk membuat carousel baru.
     */
    public function create()
    {
        return view('dashboard.beranda.carousel.create');
    }

    /**
     * Menyimpan carousel baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string', // Validasi untuk deskripsi
        ]);

        // Simpan gambar dan dapatkan path yang benar
        $path = $request->file('image')->store('images/carousel', 'public');

        Carousel::create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description, // Menyimpan deskripsi
        ]);

        return redirect()->route('dashboard.carousel.index')->with('success', 'Gambar carousel berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit carousel.
     */
    public function edit(Carousel $carousel)
    {
        return view('dashboard.beranda.carousel.edit', compact('carousel'));
    }

    /**
     * Memperbarui data carousel di database.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string', // Validasi untuk deskripsi
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description, // Menyertakan deskripsi untuk diupdate
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }
            // Simpan gambar baru dan tambahkan path ke data
            $data['image'] = $request->file('image')->store('images/carousel', 'public');
        }

        $carousel->update($data);

        return redirect()->route('dashboard.carousel.index')->with('success', 'Data carousel berhasil diperbarui.');
    }

    /**
     * Menghapus carousel dari database.
     */
    public function destroy(Carousel $carousel)
    {
        // Hapus file gambar dari storage
        if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }

        // Hapus data dari database
        $carousel->delete();

        return redirect()->route('dashboard.carousel.index')->with('success', 'Gambar carousel berhasil dihapus.');
    }
}

