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
                    <div class="page-title-subheading">Halaman ini digunakan untuk mengelola gambar carousel di halaman depan.
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
                <div class="card-header">Daftar Carousel</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $carousel)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->title }}" width="100">
                                    </td>
                                    <td>{{ $carousel->title }}</td>
                                    <td class="text-center">
                                        {{-- Tombol Edit dan Hapus akan berfungsi setelah Anda membuat view dan metodenya --}}
                                        <a href="{{ route('dashboard.carousel.edit', $carousel->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.carousel.destroy', $carousel->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data carousel.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

