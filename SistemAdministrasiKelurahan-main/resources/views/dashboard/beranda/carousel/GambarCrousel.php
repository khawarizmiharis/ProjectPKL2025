@extends('dashboard.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Manajemen Gambar Carousel
                <div class="page-title-subheading">Kelola gambar yang tampil pada halaman utama.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <a href="{{ route('carousel.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Gambar
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carousels as $key => $carousel)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <img src="{{ Illuminate\Support\Facades\Storage::url($carousel->image) }}" alt="{{ $carousel->title }}" width="150" class="img-thumbnail">
                            </td>
                            <td>{{ $carousel->title ?? '-' }}</td>
                            <td class="text-center">
                                <form action="{{ route('carousel.destroy', $carousel->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada gambar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
