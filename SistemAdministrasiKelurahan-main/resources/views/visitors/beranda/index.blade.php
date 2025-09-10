@extends('visitors.layouts.master', ['title' => "Portal Kelurahan - Kota Sukabumi"])

@section('content')

{{-- Start carousel section --}}
<section id="hero">
    <div class="container mb-4 mt-4  ">
        <div data-aos="fade-up" data-aos-delay="400" data-ride="carousel">
            <div class="carousel-caption  d-sm-block bg-glass mb-5 mt-3">
                <h1 data-aos="fade-up" data-aos-delay="500">Selamat Datang di Portal Kelurahan Kota Sukabumi</h1>
                <p class="mt-3" data-aos="fade-up" data-aos-delay="600">“Menyediakan informasi resmi kelurahan se-Kota Sukabumi“</p>
                <div data-aos="fade-up" data-aos-delay="700">
                    <a class="btn btn-get-started scroll-to-id " href="#services" role="button">Mulai Sekarang</a>
                </div>
            </div>
            <div class=" sliderimage">
                <div class=" br-full carousel-size active ">
                    <img src="{{ asset('/images') }}/carousel-1.jpg " class="d-block w-100 br-full" alt="...">
                </div>
                <div class="carousel-item br-full carousel-size">
                    <img src="{{ asset('/images') }}/carousel-2.png" class="d-block w-100 br-full" alt="...">
                </div>
                <div class="carousel-item br-full carousel-size">
                    <img src="{{ asset('/images') }}/carousel-3.png" class="d-block w-100 br-full" alt="...">
                </div>
                <div class="carousel-item br-full carousel-size">
                    <img src="{{ asset('/images') }}/carousel-4.png" class="d-block w-100 br-full" alt="...">
                </div>
            </div>

        </div>
    </div>
</section>
{{-- End carousel section --}}

{{-- Start Services Section --}}
<section id="services">
    <div class="container mt-3">
        <h2 class="text-center mb-4" style="font-weight:700; font-size:28px;" data-aos="fade-up" data-aos-delay="500">Layanan Kelurahan</h2>
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <a href="{{ route('pengajuan-surat.create') }}" class="col-lg-3 col-sm-6 text-center text-dark p-3"
                data-aos="fade-up" data-aos-delay="400">
                <span style="color: #EEF5FF;">
                    <i class="fas fa-envelope fa-3x p-4"
                        style="width: 100px; height: 100px; background-color:#FE5670; border-radius:50%;"></i>
                </span>
                <h4 class="mb-2 mt-2" style="font-weight: 600;">Pengajuan Surat</h4>
                <!-- <p class=" small"> Memudahkan dalam pembuatan surat menyurat untuk Masyarakat Kelurahan secara online</p> -->
            </a>
            <a class=" col-lg-3 text-center p-3 col-sm-6 text-dark scroll-to-bottom" href="#complaint"
                data-aos="fade-up" data-aos-delay="500">
                <span style="color: #EEF5FF;">
                    <i class="fas fa-exclamation-triangle fa-3x p-4"
                        style="width: 100px; height: 100px; background-color:#F8B000; border-radius:50%;"></i>
                </span>
                <h4 class="mb-2 mt-2" style="font-weight: 600;">Pengaduan</h4>
                <!-- <p class=" small"> Memberikan kesempatan bagi Masyarakat Kelurahan dalam menyampaikan aspirasinya untuk
                    meningkatkan berbagai pelayanan yang tersedia</p> -->
            </a>
            {{--
            <a href="{{ route('layanan.kontributor') }}" class="col-lg-3 col-sm-6 text-center p-3 text-dark"
                data-aos="fade-up" data-aos-delay="500">
                <span style="color: #EEF5FF;">
                    <i class="fas fa-pencil-alt fa-3x p-4"
                        style="width: 100px; height: 100px; background-color:#3C50E0; border-radius:50%;"></i>
                </span>
                <h4 class="mb-2 mt-2" style="font-weight: 600;">Kontributor Berita</h4>
                <!-- <p class=" small"> Warga dapat membuat beritanya sendiri mengenai desa maupun kegiatan yang dilaksanakan
                    oleh desa</p> -->
            </a>
             --}}

        </div>
    </div>
</section>
{{-- End Services Section --}}

<!-- {{-- Start Card 1 Section --}}
<section id="card1">
    <div class="container mt-4 mb-lg-4 w-100 br-full " data-aos="fade-up" data-aos-delay="400">
        <div style=" background-image:url('images/bgrd-1.png'); border-radius:10px;">
            <div class="row pl-5 pr-5 ">
                <div class="col-lg-3 m-auto title-section">
                    <div class=" text-center mt-4 title-section">
                        <h1 style="font-weight: 600; font-size: 32px;">Pengunguman</h1>
                        <p class="m-auto w-50">Memudahkan pengguna dalam membaca dan mencari
                            artikel,berita terbaru,dan kegiatan dalam Desa
                        </p>
                    </div>
                </div>
                <div class="col-lg-9 align-self-center sliderv mt-lg-4">
                    <div class="card m-3 ">
                        <div class="card-body">
                            <img src="{{ asset('/images') }}/img-kp-1.png"
                                class=" float-left mr-4 w-auto mb-3 rounded-lg" alt="Responsive image">
                            <h5 class="card-title" style="font-weight: 700;">Pengunguman</h5>
                            <p class="card-text">Memperingati Sumpah Pemuda pada 28 Oktober setiap tahunnya. Hari Sumpah
                                Pemuda lahir pada 28 Oktober 1928 silam.
                            </p><a href="#" class="btn btn-yellow">Selengkapnya>></a>
                        </div>
                    </div>
                    <div class="card m-3 ">
                        <div class="card-body">
                            <img src="{{ asset('/images') }}/img-kp-2.png"
                                class=" float-left mr-4 w-auto  mb-3 rounded-lg" alt="Responsive image">
                            <h5 class="card-title" style="font-weight: 700;">Pengunguman</h5>
                            <p class="card-text">Memperingati Sumpah Pemuda pada 28 Oktober setiap tahunnya. Hari Sumpah
                                Pemuda lahir pada 28 Oktober 1928 silam.
                            </p><a href="#" class="btn btn-yellow">Selengkapnya >></a>
                        </div>
                    </div>
                    <div class="card m-3 ">
                        <div class="card-body">
                            <img src="{{ asset('/images') }}/img-kp-3.png"
                                class=" float-left mr-4 w-auto mb-3 rounded-lg" alt="Responsive image">
                            <h5 class="card-title" style="font-weight: 700;">Pengunguman</h5>
                            <p class="card-text">Memperingati Sumpah Pemuda pada 28 Oktober setiap tahunnya. Hari Sumpah
                                Pemuda lahir pada 28 Oktober 1928 silam
                            </p>
                            <a href="#" class="btn btn-yellow">Selengkapnya >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Card 1 Section --}} -->

{{-- Start Article Section --}}
<section id="article" class="blog-posts grid-system">
    <div class="container mt-5" data-aos="fade-up" data-aos-delay="400">
        <div class="row">
            <div class="col text-center mb-4 title-section">
                <h1 style="font-weight: 600;">- Berita -</h1>
                <p class="m-auto w-50">
                    Memudahkan pengguna dalam membaca dan mencari
                    artikel, berita terbaru, dan kegiatan dalam Kelurahan
                </p>
            </div>
        </div>

        <div class="all-blog-posts">
            <div class="row">
                @php $count = 0; @endphp
                @forelse ($articles->take(3) as $article) {{-- ambil hanya 3 artikel --}}
                    @if ($article->category->slug !== 'pengumuman')
                        @php $count++; @endphp
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="blog-post">
                                <div class="bt-home">
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <a href="{{ route('visitors.artikel.show', $article->slug) }}">
                                        <h4>{{ $article->title }}</h4>
                                    </a>
                                    <hr>
                                    <p>
                                        {!! Str::limit($article->body, 150) !!}
                                        <hr>
                                        <a href="{{ route('visitors.artikel.show', $article->slug) }}">
                                            Baca lebih lanjut
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    {{-- Kalau memang tidak ada artikel sama sekali --}}
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Berita belum tersedia. Nantikan berita terbaru dari kami atau bisa laporkan melalui form
                            pengaduan. Terima kasih.
                        </div>
                    </div>
                @endforelse

                {{-- Kalau ada artikel, tapi semuanya kategori pengumuman --}}
                @if($count === 0 && $articles->count() > 0)
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Belum ada berita (selain pengumuman) yang tersedia untuk saat ini.
                        </div>
                    </div>
                @endif
            </div>

            {{-- tombol lihat semua berita --}}
            @if($articles->count() > 3)
                <div class="text-center mt-4">
                    <a href="{{ route('visitors.artikel.index') }}" 
                    class="btn px-4 py-2"
                    style="background: linear-gradient(135deg, #4F46E5, #3B82F6);
                            color: white; 
                            font-weight: 600; 
                            border-radius: 30px; 
                            transition: all 0.3s ease;">
                        <i class="fas fa-newspaper me-3"></i> Lihat Semua Berita
                    </a>
                </div>
            @endif

            <style>
                a.btn:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
                    text-decoration: none;
                }
            </style>

            <div class="col-lg-12 mb-5">
                <ul class="pagination justify-content-center">
                    {{ $articles->links() }}
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- End Article Section --}}

<!-- {{-- Start Card 2 Section --}}
<section id="card2">
    <div class=" container mb-4 w-100 br-full" data-aos="fade-up" data-aos-delay="400">
        <div style="background-image:url('images/bgrd-2.png'); border-radius:10px;">
            <div class="row">
                <div class="col text-center mt-4 mb-4 title-section">
                    <h1 style="font-weight: 600;">- UMKM -</h1>
                    <p class="m-auto w-50">Menampilkan seluruh UMKM di Desa ... dan memudahkan pengguna dalam
                        bertranksaksi
                    </p>
                </div>
            </div>
            <div class="row justify-content-center pl-sm-5 pr-sm-5 pb-sm-4">
                <div class=" col sliderh product" id="product">
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-1.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-2.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-3.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-4.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-5.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-6.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-7.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                    <div class="card m-sm-3 m-2">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="{{ asset('/images') }}/img-umkm-8.png" class="card-img-top" alt="...">
                                <div class="icon">
                                    <a href=""><i class="fas fa-shopping-basket"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold  mb-0">Product </h5>
                            <p>Category</p>
                            <ul class="list-unstyled list-inline my-2">
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                                <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
                            </ul>
                            <p>Rp 10.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Card 2 Section --}} -->

{{-- Start Complaint Section --}}
<section id="complaint">
    <div class="container mb-4 mt-4">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-10">
                <h3 class="p-3">Form Pengaduan</h3>
                <hr>
                <form action="{{ route('visitors.complaint.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">

                    {{-- Nama --}}
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama lengkap anda"
                                value="{{ old('name', $user->full_name ?? '') }}">
                            @error('name')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                        
                        {{-- Email --}}
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="name@example.com"
                                value="{{ old('email', $user->email ?? '') }}">
                            @error('email')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                    </div>

                    {{-- Nomor HP + Kategori --}}
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="phone_number" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="081234567891"
                                value="{{ old('phone_number', $user->phone ?? '') }}">
                            @error('phone_number')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label for="complaint_category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="complaint_category_id" id="complaint_category_id"
                                class="form-control @error('complaint_category_id') is-invalid @enderror" required>
                                <option value="">-- Pilih salah satu --</option>
                                @foreach ($complaint_categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('complaint_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('complaint_category_id')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                    </div>

                    {{-- Isi Aduan --}}
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Isi Aduan <span class="text-danger">*</span></label>
                        <textarea name="complaint" id="complaint" rows="3"
                            class="form-control @error('complaint') is-invalid @enderror">{{ old('complaint') }}</textarea>
                        @error('complaint')
                            <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="row justify-content-center mt-5">
                        <button type="submit" class="btn-submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
{{-- End Complaint Section --}}

{{-- Start Government Shortcut Section --}}
<section id="gov-shortcuts">
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-weight:700; font-size:28px;" data-aos="fade-up" data-aos-delay="500">
            Pintasan Aplikasi Pemerintahan
        </h2>
        <div class="row justify-content-center text-center">

            <!-- Open Data Bandung -->
            <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-delay="400">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Depan -->
                        <div class="flip-card-front card text-white shadow p-4" 
                             style="background-color:#007BFF; border-radius:12px; min-height:150px;">
                            <div class="mb-3">
                                <i class="fas fa-database fa-2x"></i>
                            </div>
                            <h5>Open Data Kota Sukabumi</h5>
                        </div>
                        <!-- Belakang -->
                        <div class="flip-card-back card text-white shadow p-4" 
                             style="background-color:#0056b3; border-radius:12px; min-height:150px;">
                            <p>Akses layanan Open Data Kota Sukabumi untuk data publik dan terbuka.</p>
                            <a href="https://opendata.sukabumikota.go.id/" target="_blank" 
                               class="btn btn-light btn-sm mt-2">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lapor.go.id -->
            <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-delay="500">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Depan -->
                        <div class="flip-card-front card text-white shadow p-4" 
                             style="background-color:#DC3545; border-radius:12px; min-height:150px;">
                            <div class="mb-3">
                                <i class="fas fa-bullhorn fa-2x"></i>
                            </div>
                            <h5>Lapor.go.id</h5>
                        </div>
                        <!-- Belakang -->
                        <div class="flip-card-back card text-white shadow p-4" 
                             style="background-color:#a71d2a; border-radius:12px; min-height:150px;">
                            <p>Platform nasional untuk menyampaikan laporan dan aspirasi masyarakat.</p>
                            <a href="https://www.lapor.go.id" target="_blank" 
                               class="btn btn-light btn-sm mt-2">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Website kota Sukabumi -->
            <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-delay="600">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Depan -->
                        <div class="flip-card-front card text-white shadow p-4" 
                             style="background-color:#EBB866; border-radius:12px; min-height:150px;">
                            <div class="mb-3">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <h5>Portal Kota Sukabumi</h5>
                        </div>
                        <!-- Belakang -->
                        <div class="flip-card-back card text-white shadow p-4" 
                             style="background-color:#a48d47; border-radius:12px; min-height:150px;">
                            <p>Portal Kota Sukabumi untuk informasi Seluruh Kota Sukabumi.</p>
                            <a href="https://sukabumikota.go.id/" target="_blank" 
                               class="btn btn-light btn-sm mt-2">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disdukcapil -->
            <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-delay="700">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Depan -->
                        <div class="flip-card-front card text-white shadow p-4" 
                             style="background-color:#00897B; border-radius:12px; min-height:150px;">
                            <div class="mb-3">
                                <i class="fas fa-id-card fa-2x"></i>
                            </div>
                            <h5>Disdukcapil</h5>
                        </div>
                        <!-- Belakang -->
                        <div class="flip-card-back card text-white shadow p-4" 
                             style="background-color:#00695C; border-radius:12px; min-height:150px;">
                            <p>Layanan administrasi kependudukan dan catatan sipil Kota Sukabumi.</p>
                            <a href="https://disdukcapil.sukabumikota.go.id/" target="_blank" 
                               class="btn btn-light btn-sm mt-2">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- End Government Shortcut Section --}}

{{-- Tambahkan CSS --}}
<style>
.flip-card {
  background-color: transparent;
  width: 100%;
  height: 200px;
  perspective: 1000px;
}
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
}
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.flip-card-back {
  transform: rotateY(180deg);
}
</style>


<script type="text/javascript">
$('.sliderh').slick({
    dots: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    infinite: false,
    cssEase: 'linear',
    autoplaySpeed: 4000,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                prevArrow: '<div class="d-none "></div>',
                nextArrow: '<div class="d-none"></div>',
            }
        }
    ]
});
$('.sliderv').slick({
    vertical: true,
    verticalSwiping: true,
    dots: true,
    touchThreshold: 100,
    slidesToShow: 1,
    cssEase: 'ease-in-out',
    dotsClass: "slick-dots-vertical",
    slidesToScroll: 1,
    autoplay: true,
    infinite: false,
    autoplaySpeed: 4000,
    prevArrow: false,
    nextArrow: false,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
            }
        },
        {
            breakpoint: 780,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.sliderimage').slick({
    draggable: true,
    arrows: true,
    prevArrow: '<div class="slick-prev-image" ></div>',
    nextArrow: '<div class="slick-next-image"></div>',
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    dotsClass: "slick-dots-image",
    speed: 900,
    infinite: true,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
    responsive: [{
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="d-none"></div>',
            nextArrow: '<div class="d-none"></div>',
        }
    }]
});
</script>

@endsection