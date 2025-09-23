@extends('dashboard.layouts.master', ['title' => "Data Pengajuan Layanan"])

@section('content')
<?php
    $data=[
        'icon' => "pe-7s-note",
        'judul' => "Data Pengajuan Layanan",
        'link' => route('manajemen-layanan.index') ,
        'page1' => "Pengajuan Layanan"
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Tabel Pengajuan Layanan</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover p-5">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Jenis Layanan</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Dokumen</th>
                            <!-- <th class="text-center">Status</th> -->
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $number => $service)
                        <tr>
                            <td class="text-center">{{ $number + 1 }}</td>
                            <td class="text-center">{{ $service->name }}</td>
                            <td class="text-center">
                                @if($service->email)
                                    {{ $service->email }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($service->phone)
                                    <a href="https://wa.me/{{ $service->phone_for_whatsapp }}?text={{ urlencode('Halo '.$service->name.', terima kasih telah mengajukan layanan. Permohonan Anda akan kami proses secepatnya.') }}"
                                    target="_blank">
                                        {{ $service->phone }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $service->category->name }}</td>
                            <td class="text-center">
                                {{ \Illuminate\Support\Str::limit($service->description, 50, '...') }}
                            </td>
                            <td class="text-center">
                                @if($service->document)
                                    <a href="{{ asset('storage/' . $service->document) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $service->created_at->format('d-m-Y H:i') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('manajemen-layanan.show', $service->id) }}" 
                                        class="btn btn-info btn-sm mr-1" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Tombol WhatsApp -->
                                    @if($service->phone)
                                        @php
                                            $phone = preg_replace('/[^0-9]/', '', $service->phone);
                                            if (substr($phone, 0, 1) === '0') {
                                                $phone = '62' . substr($phone, 1);
                                            }
                                            $message = urlencode("Halo {$service->name},\nPengajuan layanan Anda dengan jenis *{$service->category->name}* sudah kami terima. Mohon tunggu proses selanjutnya.\n\nTerima kasih 🙏");
                                        @endphp
                                        <a href="https://wa.me/{{ $phone }}?text={{ $message }}" 
                                           target="_blank" 
                                           class="btn btn-success btn-sm mr-1" 
                                           title="Balas via WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif

                                    <!-- Tombol Hapus -->
                                    <form id="delete-form-{{ $service->id }}" 
                                        action="{{ route('manajemen-layanan.destroy', $service->id) }}" 
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
                            <td colspan="9" class="text-center">Belum ada pengajuan layanan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $services->links() }}
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
