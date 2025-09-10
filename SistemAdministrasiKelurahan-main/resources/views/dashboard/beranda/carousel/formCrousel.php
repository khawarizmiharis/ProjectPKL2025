@extends('dashboard.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Tambah Gambar Carousel
                <div class="page-title-subheading">Isi form di bawah untuk menambahkan gambar baru.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Gambar</h5>
                <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="title">Judul (Opsional)</label>
                        <input name="title" id="title" placeholder="Masukkan judul singkat untuk gambar" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="image">File Gambar</label>
                        <input name="image" id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" required>
                        <small class="form-text text-muted">Pilih gambar dengan format: jpg, jpeg, png. Maksimal 2MB.</small>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Simpan</button>
                    <a href="{{ route('carousel.index') }}" class="mt-2 btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
