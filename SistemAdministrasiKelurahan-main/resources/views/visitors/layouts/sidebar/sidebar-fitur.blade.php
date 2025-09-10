{{-- <div class="col-lg-12 mb-4">
    <div class="sidebar-item search">
        <form id="search_form" name="gs" method="GET" action="#">
            <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
        </form>
    </div>
</div> --}}
<div class="col-lg-12 mb-4">
    <div class="fitur">
        <div class="sidebar-heading text-center">
            <h2>Profil Kelurahan</h2>
        </div>
        <ul>
            <li>
                <a href="{{ route('profil-kelurahan.sejarah') }}">
                    <h5>Sejarah</h5>
                </a>
            </li>
            <li>
                <a href="{{ route('profil-kelurahan.visi-misi') }}">
                    <h5>Visi & Misi</h5>
                </a>
            </li>
            <li>
                <a href="{{ route('profil-kelurahan.struktur-pemerintahan') }}">
                    <h5>Struktur Pemerintahan</h5>
                </a>
            </li>
            <li>
                <a href="{{ route('profil-kelurahan.administratif.index') }}">
                    <h5>Administratif</h5>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="col-lg-12 mb-4">
    <div class="map-posts">
        <div id="map">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122996.14439403843!2d106.836510185409!3d-6.937147721475323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6848256c9e44f5%3A0x75ce9a1669c315d6!2sSukabumi%2C%20Kota%20Sukabumi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1755656990565!5m2!1sid!2sid" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
