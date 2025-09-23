@extends('dashboard.layouts.master', ['title' => "Data Pengaduan"])

@section('content')

<?php
    $data = [
        'icon' => "pe-7s-hammer",
        'judul' => "Data Pengaduan",
        'link' => route('manajemen-pengaduan.data-pengaduan'),
        'page1' => "Data Pengaduan"
    ]
?>
@include('dashboard.layouts.page-title', $data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Tabel Pengaduan</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover p-5">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Aduan</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Lampiran</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($complaints as $number => $complaint)
                        <tr>
                            <td class="text-center">{{ $number + 1 }}</td>
                            <td class="text-center">
                                {{ $complaint->category->category ?? $complaint->other_category ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ \Illuminate\Support\Str::limit($complaint->complaint, 50, '...') }}
                            </td>
                            <td class="text-center">{{ $complaint->name }}</td>
                            <td class="text-center">{{ $complaint->email ?? '-' }}</td>
                            <td class="text-center">
                                @if($complaint->phone_number)
                                    <a href="https://wa.me/{{ $complaint->phone_number_for_whatsapp }}?text={{ urlencode('Halo '.$complaint->name.', saya ingin menanggapi pengaduan Anda.') }}"
                                    target="_blank">
                                    {{ $complaint->phone_number }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                @if($complaint->attachment)
                                    <a href="{{ asset('storage/' . $complaint->attachment) }}" 
                                    target="_blank" 
                                    class="btn btn-sm btn-primary">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($complaint->created_at)) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('manajemen-pengaduan.show', $complaint->id) }}" 
                                    class="btn btn-info btn-sm me-1" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Tombol WhatsApp -->

                                    @if($complaint->phone_number)
                                        <a href="https://wa.me/{{ $complaint->phone_number_for_whatsapp }}?text={{ urlencode('Halo '.$complaint->name.', kami dari Admin Kelurahan ingin menanggapi pengaduan Anda.') }}"
                                        target="_blank" 
                                        class="btn btn-success btn-sm me-1" 
                                        title="Halo [Nama], terima kasih sudah menyampaikan pengaduan. 
                                               Kami akan segera menindaklanjuti aduan Anda terkait: [Isi pengaduan]">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                    <!-- Tombol Hapus -->
                                    <form id="delete-form-{{ $complaint->id }}" 
                                        action="{{ route('manajemen-pengaduan.destroy', $complaint->id) }}" 
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data pengaduan</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="card-footer">
                {{ $complaints->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', 'form[id^="delete-form-"]', function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Data tidak akan bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>

@endsection