@extends('dashboard.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Manajemen Carousel
                    <div class="page-title-subheading">
                        Halaman ini digunakan untuk mengelola gambar yang tampil pada halaman utama.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('dashboard.carousel.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Carousel
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Data Carousel</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousels as $carousel)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->title }}" width="100">
                                    </td>
                                    <td>{{ $carousel->title }}</td>
                                    <td>{{ Str::limit($carousel->description, 50) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('dashboard.carousel.edit', $carousel->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('dashboard.carousel.destroy', $carousel->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
