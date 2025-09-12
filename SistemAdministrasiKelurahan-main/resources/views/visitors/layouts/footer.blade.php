<footer id="footer" class="mt-4">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-1 mt-1 mb-2">
                <div class="text-center">
                    @if(!empty($globalVillageIdentity->logo))
                        <img class="logo-footer" 
                             src="{{ asset('storage/' . $globalVillageIdentity->logo) }}" 
                             width="91" 
                             alt="Logo Kelurahan">
                    @else
                        <img class="logo-footer" 
                             src="{{ asset('/images/logo.png') }}" 
                             width="91" 
                             alt="Default Logo">
                    @endif
                </div>
            </div>
            <div class="col-lg-7 text-lg-left pl-lg-4 text-center h-100 d-block footer-info">
                <h3><b>Kelurahan {{ $villageIdentity->village_name ?? '' }}</b></h3>
                <p class="text-center mr-lg-5 text-md-left">
                    Website administrasi Kelurahan membantu masyarakat Kota Sukabumi dalam pengelolaan data dan peningkatan pelayanan.
                </p>
            </div>
            <ul class="col-lg-4 footer-distributed d-flex flex-column justify-content-center">
                @if(!empty($villageIdentity->office_address))
                <li class="d-flex align-items-center">
                    <i class="fa fa-map-marker mr-2"></i>
                    <span>
                        {{ $villageIdentity->office_address }},
                        {{ $villageIdentity->kabupaten_name ?? '' }},
                        {{ $villageIdentity->province_name ?? '' }}
                    </span>
                </li>
                @endif

                @if(!empty($villageIdentity->phone))
                <li class="d-flex align-items-center">
                    <i class="fa fa-phone mr-2"></i>
                    <span>{{ $villageIdentity->phone }}</span>
                </li>
                @endif

                @if(!empty($villageIdentity->village_email))
                <li class="d-flex align-items-center">
                    <i class="fa fa-envelope mr-2"></i>
                    <a href="mailto:{{ $villageIdentity->village_email }}">
                        {{ $villageIdentity->village_email }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</footer>
<div class="social-media">
    <div class="container">
        <span>
            @php
                $makeSocialUrl = function($value, $platform) {
                    if (!$value) return null;
                    if (preg_match('/^https?:\/\//i', $value)) return $value;
                    $value = ltrim($value, "/@ ");
                    switch ($platform) {
                        case 'instagram': return 'https://instagram.com/'.$value;
                        case 'facebook':  return 'https://facebook.com/'.$value;
                        case 'twitter':   return 'https://twitter.com/'.$value;
                        case 'youtube':   return 'https://youtube.com/'.$value;
                        default: return $value;
                    }
                };

                $igLink = $makeSocialUrl($villageIdentity->instagram ?? null, 'instagram');
                $fbLink = $makeSocialUrl($villageIdentity->facebook ?? null, 'facebook');
                $twLink = $makeSocialUrl($villageIdentity->twitter ?? null, 'twitter');
                $ytLink = $makeSocialUrl($villageIdentity->youtube ?? null, 'youtube');
            @endphp

            @if($igLink)
                <a href="{{ $igLink }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
            @endif

            @if($twLink)
                <a href="{{ $twLink }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
            @endif

            @if($fbLink)
                <a href="{{ $fbLink }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-facebook-square fa-lg"></i>
                </a>
            @endif

            @if($ytLink)
                <a href="{{ $ytLink }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-youtube fa-lg"></i>
                </a>
            @endif
        </span>
    </div>
</div>
<!-- End Footer -->
