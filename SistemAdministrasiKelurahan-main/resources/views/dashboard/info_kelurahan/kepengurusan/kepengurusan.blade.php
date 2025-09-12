@extends('dashboard.layouts.master', ['title' => "Kepengurusan Kelurahan"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-id",
        'judul' => "Kepengurusan Kelurahan",
        'link' => route('info-kelurahan.kepengurusan') ,
        'page1' => "Kepengurusan Kelurahan"
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Kepengurusan Kelurahan
                <div class="btn-actions-pane-right ">
                    <a type="button"
                        class="btn btn-lg btn-success btn-sm text-white font-weight-normal m-1 mb-2  btn-responsive"
                        href="{{ route('info-kelurahan.kepengurusan-export') }}">
                        <i class="fas fa-file-download"> </i> Unduh Data Excel
                    </a>

                    <!-- Tombol hapus terpilih -->
                    <button type="button" id="btn-delete-selected"
                        class="btn btn-lg btn-danger btn-sm text-white font-weight-normal m-1 mb-2  btn-responsive">
                        <i class="fas fa-trash-alt mr-1"></i> Hapus Data Terpilih
                    </button>

                    <a type="button"
                        class="btn btn-lg btn-focus btn-sm text-white font-weight-normal m-1 mb-2  btn-responsive"
                        href="{{route('info-kelurahan.kepengurusan-create')}}">
                        <i class="fa fa-plus mr-1"></i>
                        Tambah Pengurus
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <form id="form-delete-selected" action="{{ route('info-kelurahan.kepengurusan-delete-selected') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <table class="align-middle mb-0 table table-borderless table-striped table-hover p-5">
                        <thead>
                            <tr>
                                <th class=" text-center"><input type="checkbox" id="checkAll"></th>
                                <th class=" text-center">No.</th>
                                <th class=" text-center">Aksi</th>
                                <th class=" text-center">Foto</th>
                                <th class=" text-center">Nama , NIP, NIPD</th>
                                <th class=" text-center">Tempat, Tanggal Lahir</th>
                                <th class=" text-center">Jenis Kelamin</th>
                                <th class=" text-center">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $number => $st)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="ids[]" value="{{ $st->nik }}" class="checkItem">
                                </td>
                                <td class=" text-center">{{ ++$number }}</td>
                                <td class=" text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="#" target="_blank" class="btn btn-success btn-sm mr-1"
                                            data-toggle="tooltip" title="Pindah Posisi Keatas" data-placement="bottom">
                                            <i class="fas fa-caret-square-up "></i>
                                        </a>

                                        <a href="#" target="_blank" class="btn btn-success btn-sm mr-1"
                                            data-toggle="tooltip" title="Pindah Posisi Kebawah" data-placement="bottom">
                                            <i class="fas fa-caret-square-down"></i>
                                        </a>

                                        <a href="{{route('info-kelurahan.kepengurusan-edit', $st->nik)}}"
                                            class="btn btn-primary btn-sm mr-1 " data-toggle="tooltip"
                                            title="Edit Kepengurusan Kelurahan" data-placement="bottom">
                                            <i class="fas fa-edit "></i>
                                        </a>

                                        <form class="delete-single" action="{{ route('info-kelurahan.kepengurusan-destroy', $st->nik) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mr-1" data-toggle="tooltip"
                                                title="Hapus Anggota" data-placement="bottom">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                        @if ($st->is_active == 1)
                                        <form method="POST" action="{{ route('info-kelurahan.kepengurusan-activation', $st->nik) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="is_active" value="0">
                                            <button type="submit" class="btn btn-secondary btn-sm mr-1"
                                                data-toggle="tooltip" title="Non Aktifkan Staff" data-placement="bottom">
                                                <i class="fas fa-lock-open "></i>
                                            </button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('info-kelurahan.kepengurusan-activation', $st->nik) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="is_active" value="1">
                                            <button type="submit" class="btn btn-secondary btn-sm mr-1"
                                                data-toggle="tooltip" title="Aktifkan Staff" data-placement="bottom">
                                                <i class="fas fa-lock "></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                                <td class=" text-center">
                                    @if ($st->photo)
                                    <img src="{{ asset('storage/' . $st->photo) }}" alt="" width="70">
                                    @else
                                    <i>Belum ada foto</i>
                                    @endif
                                </td>
                                <td class="text-left">
                                    Nama : {{ $st->full_name }} <br>
                                    NIP : {{ $st->nip }} <br>
                                    NIPD : {{ $st->nipd }}
                                </td>
                                <td class=" text-center">
                                    {{ $st->villager->birth_place }},
                                    {{ date('d F Y', strtotime($st->villager->birth_date)) }}
                                </td>
                                <td class=" text-center">
                                    {{ $st->villager->sex->sex ?? '-' }}
                                </td>
                                <td class=" text-center">{{ $st->staff_position }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Select All
    $("#checkAll").click(function(){
        $(".checkItem").prop('checked', $(this).prop('checked'));
    });

    // Hapus Terpilih
    $("#btn-delete-selected").click(function(){
        var selected = [];
        $(".checkItem:checked").each(function(){
            selected.push($(this).val());
        });

        if(selected.length === 0){
            Swal.fire('Perhatian', 'Tidak ada data yang dipilih!', 'warning');
            return false;
        }

        Swal.fire({
            title: 'Hapus Data Terpilih?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form-delete-selected").submit();
            }
        })
    });

    // Hapus single
    $(".delete-single").submit(function(e){
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>

@endsection