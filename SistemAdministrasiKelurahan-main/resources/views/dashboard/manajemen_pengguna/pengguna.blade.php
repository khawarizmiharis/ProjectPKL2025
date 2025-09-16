@extends('dashboard.layouts.master', ['title' => "Pengguna "])

@section('content')

@include('dashboard.layouts.page-title', [
    'icon' => "pe-7s-user",
    'judul' => "Pengguna ",
    'link' => route('manajemen-pengguna.pengguna'),
    'page1' => "Pengguna "
])

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Pengguna
                <div class="btn-actions-pane-right d-flex">
                    <form id="formDeleteSelected" action="{{ route('manajemen-pengguna.pengguna.massDestroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Tidak perlu input hidden -->
                        <button type="submit" id="btnDeleteSelected" class="btn btn-danger" disabled>
                            Hapus Data Terpilih
                        </button>
                    </form>
                    <a class="btn btn-lg btn-focus btn-sm text-white font-weight-normal m-1 mb-2 btn-responsive"
                       href="{{ route('manajemen-pengguna.pengguna-create') }}">
                       + Tambah Data
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover p-5">
                    <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
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
                                    @php $firstRole = $user->roles->first(); @endphp

                                    @if ($firstRole && Str::lower($firstRole->name) == 'administrator')
                                        <i>Aksi tidak tersedia</i>
                                    @else
                                        @if ($firstRole)
                                        <span class="editUserRoleModal"
                                              data-toggle="modal"
                                              data-target="#editUserRoleModal"
                                              data-id="{{ $user->id }}"
                                              data-name="{{ $firstRole->name }}">
                                            <button class="btn btn-primary btn-sm mr-1" title="Edit Role Pengguna">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </span>
                                        @endif

                                        <!-- Aktivasi/Deaktivasi -->
                                        <form method="POST" action="{{ route('manajemen-pengguna.pengguna-activation', $user->id) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="is_active" value="{{ $user->is_active ? 0 : 1 }}">
                                            <button type="submit" class="btn btn-secondary btn-sm mr-1"
                                                title="{{ $user->is_active ? 'Non Aktifkan' : 'Aktifkan' }} Pengguna">
                                                <i class="fas {{ $user->is_active ? 'fa-lock-open' : 'fa-lock' }}"></i>
                                            </button>
                                        </form>

                                        <!-- Hapus -->
                                        <form class="delete-form" action="{{ route('manajemen-pengguna.pengguna-destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mr-1" title="Hapus Pengguna">
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

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Role -->
<div class="modal fade" id="editUserRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('manajemen-pengguna.pengguna.update-user-role') }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Role Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Role</label>
            <select name="role_name" id="role_name" class="form-control">
              @foreach($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
    // Modal Edit Role
    $(document).on("click", ".editUserRoleModal", function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        $("#editUserRoleModal #id").val(id);
        $("#editUserRoleModal #role_name").val(name);
    });

    // Delete 1 data (Swal)
    $(document).on('click', '.delete-form', function(e) {
        e.preventDefault();
        let form = this;
        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Data Tidak Akan Kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
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

    checkboxes.forEach(cb => cb.addEventListener('change', toggleButton));

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
                // Buat array checkbox yang dicek
                const checkedBoxes = [...checkboxes].filter(cb => cb.checked);
                
                if (checkedBoxes.length === 0) {
                    Swal.fire('Gagal', 'Tidak ada data yang dipilih', 'error');
                    return;
                }

                // Tambahkan hidden input untuk setiap ID
                checkedBoxes.forEach(cb => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'selected_id[]';
                    hidden.value = cb.value;
                    formDeleteSelected.appendChild(hidden);
                });

                formDeleteSelected.submit();
            }
        });
    });

</script>

@endsection