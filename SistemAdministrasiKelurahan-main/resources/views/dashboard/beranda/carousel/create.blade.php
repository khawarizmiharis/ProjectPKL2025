@extends('dashboard.layouts.master', ['title' => "Tambah Carousel"])

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>
                Tambah Carousel
                <div class="page-title-subheading">
                    Halaman ini digunakan untuk menambahkan gambar slider pada halaman beranda.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('dashboard.carousel.index') }}" type="button" class="btn-shadow btn btn-danger">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Formulir Tambah Carousel</h5>
                <form action="{{ route('dashboard.carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Carousel</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}" placeholder="Masukkan judul carousel...">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" rows="3"
                            placeholder="Masukkan deskripsi singkat...">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Unggah gambar untuk carousel</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                            name="image">
                        <small class="form-text text-muted">Pilih gambar dengan rasio 810 x 270 px untuk tampilan
                            terbaik.</small>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="mt-2 btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

