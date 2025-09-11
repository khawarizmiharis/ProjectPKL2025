@extends('visitors.layouts.master', ['title' => "Profil Kelurahan"])

@section('content')

{{-- Start Breadcumb Section --}}
<?php
    $data=[
        'page1' => '> Profil Kelurahan',
        'page2' => '> Visi & Misi'
    ]
?>
@include('visitors.layouts.breadcumb-artikel', $data)
{{-- End Breadcumb Section --}}

<section id="article" class="blog-posts grid-system">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="500">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-body">
                                    <h2 class="fw-bold mb-3">Visi</h2>
                                    <p class="text-justify">
                                        {!! $villageIdentity->vision ?? 'Belum ada visi' !!}
                                    </p>

                                    <h2 class="fw-bold mt-4 mb-3">Misi</h2>
                                    <p class="text-justify">
                                        {!! $villageIdentity->mission ?? 'Belum ada misi' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
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
@endsection
