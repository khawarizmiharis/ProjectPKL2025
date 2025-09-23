@extends('dashboard.layouts.master', ['title' => "Detail Pengaduan"])

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Detail Pengaduan</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $complaint->name }}</p>
            <p><strong>Email:</strong>
                @if($complaint->email)
                    {{ $complaint->email }}
                @else
                    <span class="text-muted">-</span>
                @endif
            </p>
            <p><strong>No. Telepon:</strong> {{ $complaint->phone_number }}</p>
            <p><strong>Kategori:</strong> 
                {{ $complaint->category->category ?? $complaint->other_category ?? '-' }}
            </p>
            <p><strong>Aduan:</strong><br>{{ $complaint->complaint }}</p>
            @if($complaint->attachment)
            <p><strong>Lampiran:</strong> 
                <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank">Lihat Lampiran</a>
            </p>
            @endif
            <p><strong>Tanggal Pengaduan:</strong> {{ date('d-m-Y H:i', strtotime($complaint->created_at)) }}</p>
        </div>
    </div>

    <div class="mt-3 d-flex">
        <a href="{{ route('manajemen-pengaduan.data-pengaduan') }}" class="btn btn-secondary me-2">Kembali</a>

        <!-- <form id="delete-form-{{ $complaint->id }}" 
            action="{{ route('manajemen-pengaduan.destroy', $complaint->id) }}" 
            method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                title="Hapus Pengaduan">
                Hapus Pengaduan
            </button>
        </form> -->
    </div>
</div>

<script>
    $(document).on('submit', 'form[id^="delete-form-"]', function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Hapus Pengaduan Ini?',
            text: "Data tidak akan bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data masih tersimpan :)',
                    'error'
                )
            }
        });
    });
</script>
@endsection