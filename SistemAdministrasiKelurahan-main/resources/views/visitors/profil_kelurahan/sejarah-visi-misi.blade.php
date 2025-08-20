@extends('visitors.layouts.master', ['title' => "Profil Kelurahan"])

@section('content')

{{-- Start Breadcumb Section --}}
<?php
    $data=[
        'page1' => '> Profil Kelurahan',
        'page2' => '> Sejarah Visi Misi'
    ]
?>
@include('visitors.layouts.breadcumb-artikel', $data)
{{-- End Breadcumb Section --}}

{{-- Start Article Section --}}
<section id="article" class="blog-posts grid-system">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="500">
                <div class="all-blog-posts">
                    <div class="row">
                        @if ($article)
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    {{-- <img src="{{ asset('/images') }}/img-article-01.png" alt=""> --}}
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <span>{{$article->category->category}}</span>
                                    <h4>{{$article->title}}</h4>
                                    <?php
                                        $userId = $article->user_id;
                                        $roleId = \DB::table('model_has_roles')->where('model_id', $userId)->value('role_id');
                                        $role = \DB::table('roles')->select('model_has_roles.model_id','model_has_roles.role_id', 'roles.name')
                                            ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
                                            ->where('model_has_roles.role_id', $roleId)->get()->toArray();
                                    ?>
                                    <ul class="post-info">
                                        <li><a href="#">{{$role[0]->name}}</a></li>
                                        <li><a href="#">{{$article->created_at->format('d F, Y')}}</a></li>
                                    </ul>
                                    <hr>
                                    <p class=" text-justify">
                                        {!! $article->body !!}
                                    </p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Best Templates</a>,</li>
                                                    <li><a href="#">TemplateMo</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 ">
                                                <ul class="post-share right-align">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Copy Link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-12">
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-body">
                                    <h2 class="fw-bold mb-3">Sejarah Kelurahan Kota Sukabumi</h2>
                                    <p class="text-justify">
                                        Kota Sukabumi berasal dari bahasa Sunda. Yaitu Suka-Bumen, menurut keterangan mengingat udaranya yang sejuk dan nyaman, mereka yang dating ke daerah ini tidak ingin untuk pindah lagi karena suka/ senang Bumen-Bumen atau bertempat tinggal di daerah ini.
                                        The word Sukabumi is derived from the Sundanese ‘suka’ and ‘bumen., lt was said that because the air was cool and fresh, those who came to settle here would no longer want to move elsewhere, They id ,like. (suka) ‘becoming a resident. (bumen) of this area.
                                        Pada tahun 1914 Pemerintah Hindia Belanda menjadikan Kota Sukabumi sebagai “Burgerlijk Bestuur” dengan status “Gemeente” dennan alasan bahwa di kota ini banyak berdiam orang-orang Belanda dan Eropa pemlik perkebunan-perkebunan yang berada di daerah Kabupaten Sukabumi bagian Selatan yang harus mendapatkan pengurusan dan pelayanan yang istimewa.
                                    </p>
                                    <img src="{{ asset('/images/sejarah-sukabumi.jpeg') }}" alt="Sejarah Kelurahan Kota Sukabumi" class="img-fluid rounded mb-3" style="width:400x; height:auto;">
                                    <p class="text-justify">
                                        ln 1914, the Government of the Netherlands East lndies made Kota Sukabumi (Sukabumi Town, which has developed into a Sukabumi City), a “Burgerlijk Bestuur” wrth a status of ” Gemeente ” for the reason tbat many people of tbe Netherlands and Europeans lived here They were owners of plantations in the southern part of Sukabumi Regency who deserved privileges.
                                        Sejak ditetapkannya Sukabumi menjadi daerah otonomi pada bulan Mei 1926 makaresmi diangkat “Burgemeester” yaitu Mr. GF. Rambonnet. Pada masa ini dibangun stasiun kereta api, Mesjid Agung, Gereja dan Pembangkit Listrik. Setelah Mr. GF. Rambonnet memerintah ada tiga “Burgemesteester” sebagai penggantinya yaitu : Mr. WM Ouwekerk, Mr. A LA Van Unendan, dan Mr. W.J PH Van Waning.
                                        From the time Sukabumi was determined as an autonomous region in Mav 1926, a ” Burgemeester” was officially appointed. Mr. GF. Rambonnet lt was tn thrspelod that the raiiroad, Grancr Mosque, Church, and power statron were constructed after Mr. GF. Rambonnet, there were other three “Burgemeester-s”. Mr. WM Ouwekerk, Mr. A LA Van Unen, dan Mr. W.J PH Van Waning.
                                    <p/>
                                    <h2 clas="fw-bold mt-4 mb-3">visi</h2>
                                    <p>
                                        “Terwujudnya Masyarakat Kota Sukabumi yang Inovatif, Mandiri, Agamis, Nasionalis”
                                    </p>
                                    <h2 class="fw-bold mt-4 mb-3">Misi</h2>
                                    <ul>
                                        <li>1. Mengembangkan Sumber Daya Manusia yang Berakhlak dan Berdaya Saing;</li>
                                        <li>2. Mengembangkan Sumber Daya Manusia yang Berakhlak dan Berdaya Saing;Mempercepat Transformasi Ekonomi yang Inklusif dan Berkeadilan;</li>
                                        <li>3. Menguatkan Tata Kelola Pemerintahan yang Modern dan Inovatif;</li>
                                        <li>4. Meningkatkan Stabilitas Ketenteraman dan Ketertiban Umum;</li>
                                        <li>5. Mewujudkan Masyarakat yang Religius, Berbudaya dan Ramah Lingkungan;</li>
                                        <li>6. Menyediakan Infrastrukur yang Merata dan Berkelanjutan;</li>
                                        <li>7. Menyiapkan Sarana dan Prasarana Perkotaan Berkualitas;</li>
                                        <li>8. Mewujudkan Kesinambungan Pembangunan.</li>
                                    </ul> 
                                </div>
                            </div>  
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="700">
                <div class="sidebar">
                    <div class="row justify-content-center">
                        @include('visitors.layouts.sidebar.sidebar-fitur')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Article Section --}}
@endsection
