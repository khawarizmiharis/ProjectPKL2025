<section id="breadcumb" class="breadcumb-m ">
    <div class="container">
        <div class="row mt-3 " data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-12 text-center">
                <nav aria-label="breadcrumb">
                    <small>
                        <ol class="breadcrumb" style="background: #EEF5FF; content: none;">
                            <li class=" "><a href="{{ route('visitors.beranda.index') }}">Beranda </a></li>
                            @isset($page1)
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $page1 }}
                                </li>
                            @endisset
                            {{--
                            <li class=" active" aria-current="page">&nbsp;{{ $page2 ?? ' '}} </li>
                            <li class=" active" aria-current="page">&nbsp;{{ $page3 ?? ' '}}</li>
                            --}}
                        </ol>
                    </small>
                </nav>
            </div>
        </div>
    </div>
</section>
