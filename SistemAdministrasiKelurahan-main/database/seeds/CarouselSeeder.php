<?php

use App\Carousel;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan Anda sudah meletakkan gambar-gambar berikut di
        // folder: storage/app/public/images/carousel/
        
        Carousel::create([
            'image' => 'images/carousel/carousel-1.jpg',
            'title' => 'Selamat Datang di Portal Kelurahan',
            'description' => '“Menyediakan informasi resmi kelurahan se-Kota Sukabumi“'
        ]);

        Carousel::create([
            'image' => 'images/carousel/carousel-2.png',
            'title' => 'Pelayanan Publik Modern & Cepat',
            'description' => 'Akses semua layanan publik kelurahan lebih mudah dan cepat secara online.'
        ]);

        Carousel::create([
            'image' => 'images/carousel/carousel-3.png',
            'title' => 'Informasi & Berita Terkini',
            'description' => 'Dapatkan berita dan pengumuman terbaru langsung dari kelurahan Anda.'
        ]);
    }
}
