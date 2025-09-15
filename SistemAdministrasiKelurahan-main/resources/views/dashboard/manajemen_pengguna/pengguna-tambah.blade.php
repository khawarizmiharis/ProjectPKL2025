@extends('dashboard.layouts.master', ['title' => "Tambah Pengguna"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-user",
        'judul' => "Tambah Pengguna",
        'link' => route('manajemen-pengguna.pengguna'),
        'page1' => "Pengguna",
        'page2' => "/ Tambah"
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Form Tambah Pengguna</div>
            <div class="card-body">
                <form action="{{ route('manajemen-pengguna.pengguna-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="staff">Pilih Staf Kelurahan</label>
                        <select name="staff" id="staff" class="form-control @error('staff') is-invalid @enderror" required>
                            <option value="">-- Pilih salah satu --</option>
                            @foreach($staffs as $staff)
                                @if($staff->villager)
                                    <option value="{{ $staff->id }}" {{ old('staff') == $staff->id ? 'selected' : '' }}>
                                        {{ $staff->villager->nik }} - {{ $staff->villager->full_name }} ({{ $staff->position }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('staff')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- BLOK INPUT EMAIL DIHAPUS --}}

                    {{-- BLOK INPUT PASSWORD DIHAPUS --}}

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                         @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto (opsional, maks: 1MB)</label>
                        <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('manajemen-pengguna.pengguna') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection