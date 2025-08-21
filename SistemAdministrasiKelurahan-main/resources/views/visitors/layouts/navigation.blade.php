<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
            <h1 class="text-light text-uppercase">
                <a href="{{ route('visitors.beranda.index') }}">
                    <img src="{{ asset('/images') }}/logo.png" alt="">
                    <span>Kelurahan Kota Sukabumi</span>
                </a>
            </h1>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ route('visitors.beranda.index') }}">Beranda</a>
                </li>
                <?php function activeProfilKelurahan($urlPath)
                {
                if ($urlPath == 'profil-kelurahan/sejarah-visi-misi' || $urlPath == 'profil-kelurahan/struktur-pemerintahan' || $urlPath ==
                'profil-kelurahan/administratif/jenis-kelamin') {
                return ' active';
                }
                } ?>
                <li class="drop-down{{ activeProfilKelurahan(request()->path()) }}">
                    <a href="#">Profil Kelurahan</a>
                    <ul>
                        <li><a href="{{ route('profil-kelurahan.sejarah-visi-misi') }}">Sejarah dan Visi Misi</a></li>
                        <li><a href="{{ route('profil-kelurahan.struktur-pemerintahan') }}">Struktur Pemerintahan</a></li>
                        <li>
                            <a href="{{ route('profil-kelurahan.administratif.index') }}">Administratif</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="{{ request()->is('artikel') ? 'active' : '' }}">
                    <a href="{{ route('visitors.artikel.index') }}">Artikel</a>
                </li> -->
                <?php function activeLayananPublik($urlPath)
                {
                if ($urlPath == 'layanan-publik/pengajuan-surat' || $urlPath == 'layanan-publik/pengaduan' || $urlPath ==
                'layanan-publik/kontributor-berita') {
                return ' active';
                }
                } ?>
                <li class="drop-down{{ activeLayananPublik(request()->path()) }}">
                    <a href="#">Layanan Publik</a>
                    <ul>
                        <li><a href="{{ route('pengajuan-surat.create') }}">Pengajuan Surat</a></li>
                        <li><a href="{{ route('layanan-publik.pengaduan.index') }}">Pengaduan</a></li>
                        <li><a href="{{ route('layanan-publik.form-pengaduan') }}">Form Pengaduan</a></li>
                        {{-- Kalau nanti aktif --}}
                        {{-- <li><a href="{{ route('layanan-publik.kontributor-berita.index') }}">Kontributor Berita</a></li> --}}
                    </ul>
                </li>
                <li class="{{ request()->is('umkm') ? 'active' : '' }}">
                    <a href="{{ route('visitors.umkm.index') }}">UMKM</a>
                </li>
                {{-- <li class="drop-down{{ request()->is('/kegiatan-masyarakat/umkm') ? 'active' : '' }}">
                <a href="#">Kegiatan Masyarakat</a>
                <ul>
                    <li><a href="{{ route('visitors.kegiatan_masyarakat.umkm.index') }}">UMKM Masyarakat</a></li>
                    <li><a href="">Kegiatan Pemuda</a></li>
                </ul>
                </li> --}}
                <!-- <li class="{{ request()->is('pelayanan/pengajuan-surat') ? 'active' : '' }}">
                    <a href="{{ route('pengajuan-surat.create') }}">Pengajuan Surat</a>
                </li> -->
                @guest
                <li class="btn-register"><a href="{{ route('register') }}">Daftar</a></li>
                <li class="btn-login"><a href="{{ route('login') }}">Masuk</a></li>
                @else
                <?php
                    $name = explode(' ', Auth::user()->full_name);
                    $nickname = $name[0];
                ?>
                <li class="drop-down ml-auto">
                    <a href="#">Hai, {{ $nickname }}</a>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <hr>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>