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
                                        Nama Sukabumi berasal dari bahasa Sunda, yaitu <em>“Suka-Bumen”</em>. Menurut keterangan, 
                                        mengingat udaranya yang sejuk dan nyaman, orang-orang yang datang ke daerah ini 
                                        tidak ingin pindah lagi karena merasa senang tinggal di sini. Kata <em>“suka”</em> berarti senang, 
                                        dan <em>“bumen”</em> berarti tempat tinggal. Jadi, Sukabumi dapat diartikan sebagai tempat tinggal yang menyenangkan. 
                                    </p>
                                    <p class="text-justify">
                                        Pada tahun 1914, Pemerintah Hindia Belanda menetapkan Kota Sukabumi sebagai 
                                        <em>“Burgerlijk Bestuur”</em> dengan status <em>“Gemeente”</em>. Hal ini karena di kota 
                                        ini banyak bermukim orang-orang Belanda dan Eropa, serta terdapat banyak perkebunan 
                                        yang dimiliki oleh pihak kolonial di daerah Sukabumi bagian selatan, sehingga perlu 
                                        mendapatkan pengurusan dan pelayanan yang khusus.
                                    </p>
                                    <img src="{{ asset('/images/sejarah-sukabumi.jpeg') }}" alt="Sejarah Kelurahan Kota Sukabumi" class="img-fluid rounded mb-3" style="width:400x; height:auto;">
                                    <p class="text-justify">
                                        In 1914, the Government of the Netherlands East Indies made Kota Sukabumi 
                                        (Sukabumi Town, which has developed into Sukabumi City) a 
                                        <em>“Burgerlijk Bestuur”</em> with the status of <em>“Gemeente”</em>, 
                                        for the reason that many Dutch and Europeans lived here. 
                                        They were owners of plantations in the southern part of Sukabumi Regency 
                                        who were granted privileges.
                                    </p>
                                    <p class="text-justify">
                                        Sejak ditetapkannya Sukabumi menjadi daerah otonom pada bulan Mei 1926, 
                                        maka resmi diangkat <em>“Burgemeester”</em> yaitu Mr. G.F. Rambonnet. 
                                        Pada masa ini dibangun stasiun kereta api, Masjid Agung, Gereja, 
                                        dan Pembangkit Listrik. Setelah Mr. G.F. Rambonnet memerintah, 
                                        ada tiga <em>“Burgemeester”</em> sebagai penggantinya yaitu: 
                                        Mr. W.M. Ouwekerk, Mr. A.L.A. Van Unendan, dan Mr. W.J. Ph. Van Waning.
                                    </p>
                                    <p class="text-justify">
                                        From the time Sukabumi was determined as an autonomous region in May 1926, 
                                        a <em>“Burgemeester”</em> was officially appointed, Mr. G.F. Rambonnet. 
                                        It was in this period that the railroad, Grand Mosque, Church, 
                                        and power station were constructed. After Mr. Rambonnet, 
                                        there were three successors as <em>“Burgemeester”</em>: 
                                        Mr. W.M. Ouwekerk, Mr. A.L.A. Van Unen, and Mr. W.J. Ph. Van Waning.
                                    </p>
                                    <h2 clas="fw-bold mt-4 mb-3">Visi</h2>
                                    <p><em>“Terwujudnya Masyarakat Kota Sukabumi yang Inovatif, Mandiri, Agamis, Nasionalis”</em></p>
                                    <h2 class="fw-bold mt-4 mb-3">Misi</h2>
                                    <ol class="misi">
                                        <li>Mengembangkan Sumber Daya Manusia yang Berakhlak dan Berdaya Saing;</li>
                                        <li>Mengembangkan Sumber Daya Manusia yang Berakhlak dan Berdaya Saing; Mempercepat Transformasi Ekonomi yang Inklusif dan Berkeadilan;</li>
                                        <li>Menguatkan Tata Kelola Pemerintahan yang Modern dan Inovatif;</li>
                                        <li>Meningkatkan Stabilitas Ketenteraman dan Ketertiban Umum;</li>
                                        <li>Mewujudkan Masyarakat yang Religius, Berbudaya dan Ramah Lingkungan;</li>
                                        <li>Menyediakan Infrastrukur yang Merata dan Berkelanjutan;</li>
                                        <li>Menyiapkan Sarana dan Prasarana Perkotaan Berkualitas;</li>
                                        <li>Mewujudkan Kesinambungan Pembangunan.</li>
                                    </ol> 
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
