@extends('dashboard.layouts.master', ['title' => "Tambah Pengguna"])

@section('content')

<?php
    $data = [
        'icon' => "pe-7s-user",
        'judul' => "Tambah Pengguna",
        'link' => route('manajemen-pengguna.pengguna'),
        'page1' => "Pengguna",
        'page2' => "/ Tambah"
    ];
?>
@include('dashboard.layouts.page-title', $data)

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Form Tambah Pengguna</div>
            <div class="card-body">

                {{-- Alert error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('manajemen-pengguna.pengguna-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Pilih Staff --}}
                    <div class="form-group">
                        <label for="staff">Pilih Staf Kelurahan</label>
                        <select name="staff" id="staff" class="form-control @error('staff') is-invalid @enderror" required>
                            <option value="" disabled selected>-- Pilih salah satu --</option>
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

                    {{-- Pilih Role --}}
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                            <option value="" disabled selected>-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Input Email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Masukkan email pengguna" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Input Password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" 
                            name="password" 
                            id="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Masukkan password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="form-control" 
                            placeholder="Ulangi password" required>
                    </div>

                    {{-- Upload Foto --}}
                    <div class="form-group">
                        <label for="photo">Foto (opsional, maks: 1MB)</label>
                        <input type="file" 
                               name="photo" 
                               id="photo" 
                               class="form-control @error('photo') is-invalid @enderror" 
                               accept="image/*">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Tombol Submit / Batal --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('manajemen-pengguna.pengguna') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
