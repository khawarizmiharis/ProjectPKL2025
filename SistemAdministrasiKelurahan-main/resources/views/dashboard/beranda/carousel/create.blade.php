@extends('dashboard.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Tambah Carousel Baru
                    <div class="page-title-subheading">
                        Halaman ini digunakan untuk menambahkan gambar carousel baru.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('dashboard.carousel.index') }}" class="btn-shadow mr-3 btn btn-info">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Form Tambah Carousel</div>
                <div class="card-body">
                    <form action="{{ route('dashboard.carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="title" class="">Judul</label>
                            <input name="title" id="title" placeholder="Masukkan judul carousel" type="text"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="description" class="">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Masukkan deskripsi singkat">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="image" class="">Gambar</label>
                            <input name="image" id="image" type="file"
                                class="form-control-file @error('image') is-invalid @enderror">
                            <small class="form-text text-muted">Unggah gambar untuk carousel.</small>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
