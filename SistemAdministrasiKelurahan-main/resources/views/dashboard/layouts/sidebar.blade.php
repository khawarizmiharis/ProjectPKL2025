<aside class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
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
    <div class="scrollbar-sidebar ">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu ">
                @php
                // cek apakah user login
                $userRoleId = Auth::check() && optional(Auth::user()->roles)->count() > 0
                    ? Auth::user()->roles->pluck('id')->first()
                    : null;

                // ambil menu jika ada role
                $menus = $userRoleId
                    ? \DB::table('dashboard_menus')
                        ->select('dashboard_menus.id', 'dashboard_menus.name')
                        // ->join('permissions', 'dashboard_menus.name', '=', 'permissions.name')
                        ->join('permissions', function($join){
                            $join->on('permissions.name', '=', DB::raw("
                                CASE WHEN dashboard_menus.name='Menu Utama' THEN 'Dashboard'
                                    ELSE dashboard_menus.name END
                            "));
                        })
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where('role_has_permissions.role_id', $userRoleId)
                        ->whereNotIn('dashboard_menus.name', ['Layanan', 'Manajemen Surat', 'Manajemen UMKM', 'Manajemen Menu'])
                        ->orderByRaw("FIELD(dashboard_menus.id, 1,2,3,4,5,6,11,9,7,8,10)")
                        ->get()
                    : collect();
                @endphp

                @foreach ($menus as $menu)
                    <li class="app-sidebar__heading ">{{ $menu->name }}</li>
                    @php
                        $subMenus = DB::table('dashboard_sub_menus')
                            ->join('dashboard_menus', 'dashboard_sub_menus.menu_id', '=', 'dashboard_menus.id')
                            ->where([
                                ['dashboard_sub_menus.menu_id', '=', $menu->id],
                                ['dashboard_sub_menus.is_active', '=', 1]
                            ])
                            ->whereNotIn('dashboard_sub_menus.sub_menu', ['Wilayah', 'Data Administratif', 'Log Aktivitas Pengguna', 'Kontribusi Artikel']) // 🚫 sembunyikan sub menu
                            ->get();
                    @endphp

                    @foreach ($subMenus as $subMenu)
                        @php
                            $paths = Request::segments();
                            $path = '';
                            foreach ($paths as $p) {
                                $path .= '/' . $p;
                            }
                        @endphp
                        <li>
                            <a href="{{ $subMenu->url_path }}" class="{{ $path == $subMenu->url_path ? 'mm-active':'' }}">
                                <i class="{{ $subMenu->icon }}"></i>
                                {{ $subMenu->sub_menu }}
                                @if ($subMenu->sub_menu == 'UMKM')
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                @endif
                            </a>
                            @if ($subMenu->sub_menu == 'UMKM')
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>Profil Penjual
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>Produk
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</aside>
