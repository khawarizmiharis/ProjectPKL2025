@extends('visitors.layouts.master', ['title' => "Profil Kelurahan"])

@section('content')

{{-- Start Breadcumb Section --}}
<?php
    $data=[
        'page1' => '> Profil Kelurahan',
        'page2' => '> Struktur Pemerintahan'
    ]
?>
@include('visitors.layouts.breadcumb-artikel', $data)
{{-- End Breadcumb Section --}}

{{-- Start Struktur Pemerintahan Section --}}
<section id="struktur" class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="500">
                <div class="all-blog-posts">
                    <div class="row">
                        @if ($staff->count() > 0)
                            @foreach ($staff as $s)
                                <div class="col-lg-12 mb-4">
                                    <div class="blog-post">
                                        <div class="blog-thumb text-center">
                                            @if ($s->photo)
                                                <img src="{{ Storage::url($s->photo) }}" 
                                                    alt="{{ $s->full_name }}" 
                                                    class="img-fluid rounded mb-3" 
                                                    style="max-height: 250px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('/images/default-user.png') }}" 
                                                    alt="default" 
                                                    class="img-fluid rounded mb-3" 
                                                    style="max-height: 250px; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="down-content text-center mt-3">
                                            <h4>{{ $s->full_name }}</h4>
                                            <p><strong>{{ $s->staff_position }}</strong></p>
                                            <p>Periode: {{ $s->position_period }}</p>
                                            <p>Pangkat: {{ $s->pangkat }}</p>
                                            <p>NIP: {{ $s->nip }}</p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="800">
                                <div class="alert alert-info text-center">
                                    Struktur pemerintahan belum tersedia. Nantikan informasi terbaru dari kami. Terima kasih.
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
{{-- End Struktur Pemerintahan Section --}}

@endsection
