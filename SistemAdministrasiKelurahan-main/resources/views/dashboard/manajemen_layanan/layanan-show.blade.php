@extends('dashboard.layouts.master', ['title' => "Detail Pengajuan Layanan"])

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Detail Pengajuan Layanan</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $service->name }}</p>
            <p><strong>Email:</strong> {{ $service->email }}</p>
            <p><strong>No. HP:</strong> {{ $service->phone }}</p>
            <p><strong>Jenis Layanan:</strong> {{ $service->category->name }}</p>
            <p><strong>Keterangan:</strong><br>{{ $service->description }}</p>
            @if($service->document)
            <p><strong>Dokumen:</strong> 
                <a href="{{ Storage::url($service->document) }}" target="_blank">Lihat Dokumen</a>
            </p>
            @endif
            <p><strong>Tanggal Pengajuan:</strong> {{ $service->created_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
    <a href="{{ route('manajemen-layanan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
