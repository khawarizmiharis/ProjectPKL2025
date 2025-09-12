<footer id="footer" class="mt-4">
    <div class="container">
        <div class="row d-flex ">
            <div class="col-lg-1 mt-1 mb-2">
                <div class="text-center">
                    <img class="logo-footer" src="{{ asset('/images') }}/logo.png" width="91">
                </div>
            </div>
            <div class="col-lg-7 text-lg-left pl-lg-4  text-center h-100 d-block footer-info">
                <h3><b>Kelurahan {{ $villageIdentity->village_name ?? '' }}</b></h3>
                <p class="text-center mr-lg-5 text-md-left">Website administrasi Kelurahan membantu masyarakat Kota Sukabumi dalam pengelolaan data dan peningkatan pelayanan.
                </p>
            </div>
            <ul class=" col-lg-4 footer-distributed d-flex flex-column justify-content-center">
                <li>
                    <p><i class="fa fa-map-marker"></i><span>Kelurahan {{ $villageIdentity->village_name ?? '' }}, </span>Jawa Barat</p>
                </li>
                <li>
                    <p><i class="fa fa-phone"></i>+62 (266) 20229715</p>
                </li>
                <li>
                    <p><i class="fa fa-envelope"></i><a href="mailto:diskominfo@sukabumikota.go.id">diskominfo@sukabumikota.go.id</a></p>
                </li>
            </ul>
        </div>
    </div>
</footer>
<div class=" social-media">
    <div class="container ">
        <span class=" ">
            <a href="https://www.instagram.com/diskominfo_sukabumikota?utm_source=ig_web_button_share_sheet&igsh=cTZtaWc0Mm42YXBh" target="-blank"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="https://x.com/Pemkot_Sukabumi" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
            <a href="#"><i class="fab fa-youtube fa-lg"></i></a>
        </span>
    </div>
</div>
<!-- End Footer -->
