{{-- ... existing code ... --}}
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="container mb-4 mt-4  ">
        <div data-aos="fade-up" data-aos-delay="400" data-ride="carousel">

            {{-- Mengambil data dari carousel pertama untuk judul utama --}}
            @if ($carousels->count() > 0)
                <div class="carousel-caption d-sm-block bg-glass mb-5 mt-3">
                    <h1 data-aos="fade-up" data-aos-delay="500">
                        {{ $carousels->first()->title ?? 'Selamat Datang di Portal Kelurahan' }}
                    </h1>
                    <p class="mt-3" data-aos="fade-up" data-aos-delay="600">
                        {{ $carousels->first()->description ?? '“Menyediakan informasi resmi kelurahan se-Kota Sukabumi“' }}
                    </p>
                    <div data-aos="fade-up" data-aos-delay="700">
                        <a class="btn btn-get-started scroll-to-id " href="#services" role="button">Mulai Sekarang</a>
                    </div>
                </div>
            @endif

            <div class="sliderimage">
                {{-- Loop untuk menampilkan semua gambar carousel dari database --}}
                @forelse ($carousels as $carousel)
                    <div class="carousel-item br-full carousel-size @if ($loop->first) active @endif">
                        <img src="{{ asset('storage/' . $carousel->image) }}" class="d-block w-100 br-full"
                            alt="{{ $carousel->title }}">
                    </div>
                @empty
                    {{-- Tampilan jika tidak ada gambar di database --}}
                    <div class="carousel-item br-full carousel-size active">
                        <img src="{{ asset('/images') }}/carousel-1.jpg" class="d-block w-100 br-full"
                            alt="Gambar Default">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tidak Ada Gambar</h5>
                            <p>Silakan tambahkan gambar melalui dashboard admin.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>
<!-- End Hero -->
{{-- ... existing code ... --}}
