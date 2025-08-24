{{-- @extends('layouts.app') {{-- sesuaikan dengan layout utama yang dipakai --}}
{{-- @include('sweetalert::alert') --}}

@extends('visitors.layouts.master', ['title' => 'Layanan - Form Pengaduan'])
{{-- Start Breadcumb Section --}}
@include('visitors.layouts.breadcumb', ['judul' => "Form Pengaduan"], ['page3' => "/ Form Pengaduan"])

@section('content')
<div class="container mb-5 pt-3">
    <div class="row justify-content-center form-box" data-aos="fade-up" data-aos-delay="300" style="margin-bottom: 70px;">
        <div class="col-lg-10">

            {{-- Judul form + tombol Back ke Home --}}
            {{--
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Form Pengaduan</h3>
                <a href="{{ route('visitors.beranda.index') }}" class="btn btn-secondary btn-sm">
                    &laquo; Kembali ke Home
                </a>
            </div>
            <hr>
            --}}

            <form action="{{ route('visitors.complaint.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ isset($user_id) ? $user_id : '' }}">

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Nama lengkap Anda"
                               value="{{ old('name', isset($user) ? $user->full_name : '') }}"
                               required>
                        @error('name')
                            <small class="text-danger fst-italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="name@example.com"
                               value="{{ old('email', isset($user) ? $user->email : '') }}"
                               required>
                        @error('email')
                            <small class="text-danger fst-italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="phone_number" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" id="phone_number"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               placeholder="081234567891"
                               value="{{ old('phone_number', isset($user) ? $user->phone : '') }}"
                               required>
                        @error('phone_number')
                            <small class="text-danger fst-italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="complaint_category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="complaint_category_id" id="complaint_category_id"
                                class="form-control @error('complaint_category_id') is-invalid @enderror"
                                required>
                            <option value="">Pilih salah satu...</option>
                            @if(isset($complaint_categories) && count($complaint_categories) > 0)
                                @foreach ($complaint_categories as $category)
                                    <option value="{{ $category->id }}" {{ old('complaint_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('complaint_category_id')
                            <small class="text-danger fst-italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="complaint" class="form-label">Isi Aduan <span class="text-danger">*</span></label>
                    <textarea name="complaint" id="complaint" rows="4"
                              class="form-control @error('complaint') is-invalid @enderror"
                              required>{{ old('complaint') }}</textarea>
                    @error('complaint')
                        <small class="text-danger fst-italic">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row justify-content-center mt-4">
                    <button type="submit" class="btn-submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
