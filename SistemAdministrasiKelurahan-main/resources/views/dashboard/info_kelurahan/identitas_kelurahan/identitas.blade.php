@extends('dashboard.layouts.master', ['title' => "Identitas Kelurahan"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-culture",
        'judul' => "Identitas Kelurahan",
        'link' => route('info-desa.identitas') ,
        'page1' => "Identitas Kelurahan"
    ]
?>
@include('dashboard.layouts.page-title',$data)
<div class="row">
    <div class="col-md-12 ">
        <div class="main-card mb-3 card ">
            <div class=" btn-actions-pane-left m-3 ">
                {{-- <a type="button" class="btn btn-lg btn-success btn-sm text-white font-weight-normal btn-responsive m-1"
                    href="#">
                    <i class="fas fa-plus mr-1"></i> Tambah Identitas Kelurahan </a> --}}
                <a type="button" class="btn btn-lg btn-primary btn-sm text-white font-weight-normal btn-responsive m-1"
                    href="{{route('info-desa.identitas.edit', $villageIdentity->id)}}">
                    <i class="fas fa-edit mr-1"></i> Edit Identitas Kelurahan</a>
                <a type="button"
                    class="btn btn-lg btn-alternate btn-sm text-white font-weight-normal btn-responsive m-1"
                    href="https://www.google.com/maps/place/Sukabumi,+Kota+Sukabumi,+Jawa+Barat/@-6.937014,106.91731,11z/data=!4m6!3m5!1s0x2e6848256c9e44f5:0x75ce9a1669c315d6!8m2!3d-6.9181652!4d106.93152!16zL20vMDdibjAw?hl=id&entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank">
                    <i class="fas fa-map mr-1"></i> Lokasi Kantor Kelurahan
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-header">Visi
            </div>
            <div class="m-4">
                <p>
                    {{ $villageIdentity->vision }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-header">Misi
            </div>
            <div class="m-4">
                <p>
                    {{ $villageIdentity->mission }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Sejarah
            </div>
            <div class="m-4">
                <p>
                    {{ $villageIdentity->history }}
                </p>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive ">
                <table class="mb-0 table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" class="card-header bg-secondary text-white text-center" style="width: 100%px">Kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Nama Kelurahan</td>
                            <td style="width: 20px;" class="text-center">:</td>
                            <td>{{ $villageIdentity->village_name }}</td>
                        </tr>
                        <tr>
                            <td>Kode Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->village_code }}</td>
                        </tr>
                        <tr>
                            <td>Kode Pos Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->zip_code }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kepala_desa_name }}</td>
                        </tr>
                        <tr>
                            <td>NIP Kepala Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kepala_desa_nip }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Kantor Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->office_address }}</td>
                        </tr>
                        <tr>
                            <td>E-Mail Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->village_email }}</td>
                        </tr>
                        <tr>
                            <td>Telepon Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->phone }}</td>
                        </tr>
                        <tr>
                            <td>Website Kelurahan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->website }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="mb-0 table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" class="card-header bg-secondary text-white text-center">Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Nama Kecamatan</td>
                            <td style="width: 20px;" class="text-center">:</td>
                            <td>{{ $villageIdentity->kecamatan_name }}</td>
                        </tr>
                        <tr>
                            <td>Kode Kecamatan</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kecamatan_code }}</td>
                        </tr>
                        <tr>
                            <td>Nama Camat</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kepala_camat_name }}</td>
                        </tr>
                        <tr>
                            <td>NIP Camat</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kepala_camat_nip }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="mb-0 table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" class="card-header bg-secondary text-white text-center">Kabupaten</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Nama Kabupaten</td>
                            <td style="width: 20px;" class="text-center">:</td>
                            <td>{{ $villageIdentity->kabupaten_name }}</td>
                        </tr>
                        <tr>
                            <td>Kode Kabupaten</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->kabupaten_code }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="mb-0 table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" class="card-header bg-secondary text-white text-center">Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Nama Provinsi</td>
                            <td style="width: 20px;" class="text-center">:</td>
                            <td>{{ $villageIdentity->province_name }}</td>
                        </tr>
                        <tr>
                            <td>Kode Provinsi</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->province_code }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="mb-0 table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" class="card-header bg-secondary text-white text-center">Media Sosial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Instagram</td>
                            <td style="width: 20px;" class="text-center">:</td>
                            <td>{{ $villageIdentity->instagram }}</td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->facebook }}</td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->twitter }}</td>
                        </tr>
                        <tr>
                            <td>Youtube</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->youtube }}</td>
                        </tr>
                        <tr>
                            <td>Link Google Maps</td>
                            <td class="text-center">:</td>
                            <td>{{ $villageIdentity->maps_link ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">Foto Gedung</div>
            <img class="img-fluid" style="width: 100%; height: 350px; overflow: hidden; object-fit: cover;"
                alt="Responsive image" src="{{ asset('/admin') }}/images/foto-kelurahan.jpg" alt="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">Logo Kelurahan</div>
            <img class="img-fluid" style="width: 100%; height: 350px; overflow: hidden; object-fit: scale-down;"
                alt="Responsive image" src="{{ asset('/images') }}/logo.png" alt="">
        </div>
    </div>
</div>


@endsection
