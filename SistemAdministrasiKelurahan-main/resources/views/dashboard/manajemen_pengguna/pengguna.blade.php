@extends('dashboard.layouts.master', ['title' => "Pengguna "])

@section('content')

<?php
    $data = [
        'icon' => "pe-7s-user",
        'judul' => "Pengguna ",
        'link' => route('manajemen-pengguna.pengguna'),
        'page1' => "Pengguna "
    ];
?>
@include('dashboard.layouts.page-title', $data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Pengguna
                <div class="btn-actions-pane-right d-flex">
                    <!-- Form hapus massal -->
                <form id="formDeleteSelected" action="{{ route('users.massDestroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="selected_id" id="selected_ids">
                    <button type="submit" id="btnDeleteSelected" class="btn btn-danger" disabled>
                        Hapus Data Terpilih
                    </button>
                </form>

                    <a type="button"
                        class="btn btn-lg btn-focus btn-sm text-white font-weight-normal m-1 mb-2 btn-responsive"
                        href="{{ route('manajemen-pengguna.pengguna-create') }}">+
                        Tambah Data
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover p-5">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <input type="checkbox" id="checkAll">
                            </th>
                            <th class="text-center">No.</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Terakhir login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $number => $user)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="selected_id[]" value="{{ $user->id }}" class="chkbox">
                            </td>
                            <td class="text-center">{{ $number + $users->firstItem() }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    @php
                                        $firstRole = $user->roles->first();
                                    @endphp

                                    @if ($firstRole && Str::lower($firstRole->name) == 'administrator')
                                        <i>Aksi tidak tersedia</i>
                                    @else
                                        @if ($firstRole)
                                        <span class="editUserRoleModal"
                                              data-toggle="modal"
                                              data-target="#editUserRoleModal"
                                              data-id="{{ $user->id }}"
                                              data-name="{{ $firstRole->name }}">
                                            <button class="btn btn-primary btn-sm mr-1"
                                                data-toggle="tooltip"
                                                title="Edit Role Pengguna"
                                                data-placement="bottom">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </span>
                                        @endif

                                        @if ($user->is_active == 1)
                                        <form method="POST" action="{{ route('manajemen-pengguna.pengguna-activation', $user->id) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="is_active" value="0">
                                            <button type="submit" class="btn btn-secondary btn-sm mr-1"
                                                data-toggle="tooltip" title="Non Aktifkan Pengguna" data-placement="bottom">
                                                <i class="fas fa-lock-open"></i>
                                            </button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('manajemen-pengguna.pengguna-activation', $user->id) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="is_active" value="1">
                                            <button type="submit" class="btn btn-secondary btn-sm mr-1"
                                                data-toggle="tooltip" title="Aktifkan Pengguna" data-placement="bottom">
                                                <i class="fas fa-lock"></i>
                                            </button>
                                        </form>
                                        @endif

                                        <form id="delete-form" action="{{ route('manajemen-pengguna.pengguna-destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mr-1"
                                                data-toggle="tooltip" title="Hapus Anggota" data-placement="bottom">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="" width="70">
                                @else
                                    <i>Belum ada foto</i>
                                @endif
                            </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->full_name }}</td>
                            <td class="text-center">{{ $firstRole ? $firstRole->name : '-' }}</td>
                            <td class="text-center">{{ $user->last_login }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-block card-footer">
                <div class="card-body">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $users->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Modal Edit Role
    $(document).on("click", ".editUserRoleModal", function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        $("#editUserRoleModal .modal-body #id").val(id);
        $("#editUserRoleModal .modal-body #role_name").val(name);
    });

    // Delete 1 data (swal)
    $(document).on('click', '#delete-form', function(e) {
        var form = this;
        e.preventDefault();
        swal.fire({
            title: 'Hapus Data Ini?',
            text: "Data Tidak Akan Kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                return form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swal.fire('Dibatalkan', 'Data anda masih tersimpan :)', 'error');
            }
        });
    });

    // Hapus Massal
    const btnDeleteSelected = document.getElementById('btnDeleteSelected');
    const checkAll = document.getElementById('checkAll');
    const checkboxes = document.querySelectorAll('.chkbox');
    const formDeleteSelected = document.getElementById('formDeleteSelected');

    checkAll.addEventListener('change', function () {
        checkboxes.forEach(cb => cb.checked = this.checked);
        toggleButton();
    });

    checkboxes.forEach(cb => {
        cb.addEventListener('change', toggleButton);
    });

    function toggleButton() {
        const anyChecked = [...checkboxes].some(cb => cb.checked);
        btnDeleteSelected.disabled = !anyChecked;
    }

    formDeleteSelected.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Hapus Data Terpilih?',
            text: "Data yang dipilih tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                formDeleteSelected.submit();
            }
        });
    });
</script>

@endsection
