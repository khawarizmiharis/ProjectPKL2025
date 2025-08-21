<div class="app-header header-shadow">
    <div class="app-header__logo">
        <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">
            <div class="logo-src">
                <img src="{{ asset('/images') }}/logo.png" alt="">
                <h5 class="ml-2">Desa</h5>
            </div>
        </a>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            {{-- Jika ada menu kiri bisa ditambahkan di sini --}}
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left text-right mr-3 header-user-info">
                            <div class="widget-heading">
                                {{ optional(Auth::user())->full_name ?? 'Guest' }}
                            </div>
                            <div class="widget-subheading">
                                {{ Auth::check() && Auth::user()->roles && Auth::user()->roles->count() > 0 
                                    ? Auth::user()->roles->first()->name 
                                    : 'Guest' }}
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{ asset('/admin/images/avatars/logo-cp-black.png') }}" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <button type="button" tabindex="0" class="dropdown-item">Akun Pengguna</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Pengaturan</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Notifikasi</button>
                                    <a href="{{ route('visitors.beranda.index') }}" type="button" tabindex="0" class="dropdown-item">Kembali Ke Beranda</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    @if(Auth::check())
                                        <a type="button" tabindex="0" class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a type="button" tabindex="0" class="dropdown-item" href="{{ route('login') }}">Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Tambahan tombol kanan header bisa ditambahkan di sini --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
