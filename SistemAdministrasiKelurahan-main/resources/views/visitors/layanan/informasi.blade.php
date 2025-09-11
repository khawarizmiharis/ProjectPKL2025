@extends('visitors.layouts.master',['title' => 'Layanan'])

@section('content')
{{-- Start Breadcumb Section --}}
<?php
    $data=[
        'page1' => '> Informasi Jenis Layanan',
    ]
?>
@include('visitors.layouts.breadcumb-artikel', $data)
{{-- End Breadcumb Section --}}

<section id="page-title-layanan">
<div class="container my-3" data-aos="fade-up" data-aos-delay="500">
    <h2 class="fw-bold mb-3 text-center">Informasi Jenis Layanan</h2>
    <p class="m-auto w-75 text-center">Memudahkan masyarakat dalam mengetahui persyaratan administrasi dan layanan yang tersedia di kelurahan secara jelas dan terperinci</p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-5 mb-5">
            <thead class="thead-dark">
                <tr>
                    <th class = "text-center">Jenis Layanan</th>
                    <th class = "text-center">Persyaratan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Register KTP</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy KTP</li>
                            <li>Berusia 17 tahun/pernah menikah jika berusia di bawah 17 tahun (permohonan baru)</li>
                            <li>Membawa KTP Lama (yang asli), jika perpanjangan</li>
                            <li>Surat Ket. Kehilangan dari Kepolisian, jika hilang</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                <td>Register KK</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy KK</li>
                            <li>Berusia 17 tahun/pernah menikah jika berusia di bawah 17 tahun (permohonan baru)</li>
                            <li>Membawa KTP Lama (yang asli), jika perpanjangan</li>
                            <li>Surat Ket. Kehilangan dari Kepolisian, jika hilang</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                <td>Domisili Haji</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy KK</li>
                            <li>Berusia 17 tahun/pernah menikah jika berusia di bawah 17 tahun (permohonan baru)</li>
                            <li>Membawa KTP Lama (yang asli), jika perpanjangan</li>
                            <li>Surat Ket. Kehilangan dari Kepolisian, jika hilang</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Surat Keterangan Orang Sama</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Membawa Fc. KK dan KTP</li>
                            <li>Membawa Surat Pernyataan/penjelasan yang diketahui RT dan RW</li>
                            <li>Membawa berkas/data yang terdapat perbedaan</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Belum Memiliki Rumah</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Membawa Fc. KK dan KTP</li>
                            <li>Membawa Surat Pernyataan Belum Memiliki Rumah yang diketahui RT dan RW</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Belum Menikah</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Membawa Fc. KK dan KTP</li>
                            <li>Membawa Surat Pernyataan/penjelasan BAHWA BELUM MENIKAH yang diketahui RT dan RW</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Pindah Datang Dalam Kota</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Surat Keterangan Pindah dari Kelurahan asal</li>
                            <li>Surat Keterangan Pindah dari Kecamatan asal</li>
                            <li>Kartu Keluarga dan KTP</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Pindah Keluar</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Membawa KK dan KTP asli</li>
                            <li>Mengisi Form Isian Data Kelurahan (Form Isian)</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Lahir +30 Hari</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Surat Pernyataan yang ditandatangani oleh RT, RW, Kelurahan yang diketahui dua orang saksi</li>
                            <li>Surat keterangan dari Dinas Kependudukan</li>
                            <li>Fotocopy Kartu Keluarga dan KTP yang bersangkutan dan pelapor</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan SKTM Pendidikan</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP Orang Tua</li>
                            <li>Form Isian Pernyataan Tidak Mampu yang diketahui RT dan RW</li>
                            <li>Form Isian mengontrak/tinggal menumpang yang diketahui RT</li>
                            <li>Keterangan Tidak Mampu/Rawan Melanjutkan Pendidikan yang dikeluarkan dari Sekolah asal</li>
                            <li>Foto Orang Tua dan Anak didepan rumah dan depan rumah</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan SKTM Umum</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP Orang Tua/yang bersangkutan</li>
                            <li>Form Isian Pernyataan Tidak Mampu yang diketahui RT dan RW</li>
                            <li>Form Isian mengontrak/tinggal menumpang yang diketahui RT</li>
                            <li>Foto Orang Tua dan Anak didepan rumah dan depan rumah</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Lahir -30 Hari</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Surat Keterangan Lahir dari Bidan / Rumah Sakit</li>
                            <li>Fotocopy Surat Nikah</li>
                            <li>Fotocopy Kartu Keluarga yang sudah terdapat nama dan nik bayi</li>
                            <li>Fotocopy KTP kedua Orangtua Bayi</li>
                            <li>Form Isian dari Dinas Kependudukan</li>
                            <li>Fotocopy KTP dua Orang Saksi</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Domisili Yayasan</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP Ketua Yayasan</li>
                            <li>Fotocopy Akta Pendirian / Perubahan</li>
                            <li>Denah Lokasi Yayasan</li>
                            <li>Form Ijin Tetangga (2 Kiri, 2 Kanan, 2 Depan, dan 2 Belakang yang diketahui RT dan RW)</li>
                            <li>Fotocopy Bukti Pelunasan PBB 3 Tahun terakhir</li>
                            <li>Form Isian Surat Ijin Pemilik Lahan (jika sewa/kontrak)</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Domisili Perusahaan</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP Direktur Utama</li>
                            <li>Fotocopy Akta Pendirian Notaris</li>
                            <li>Denah Lokasi Perusahaan</li>
                            <li>Form Ijin Tetangga (2 Kiri, 2 Kanan, 2 Depan, dan 2 Belakang yang diketahui RT dan RW)</li>
                            <li>Fotocopy Bukti Pelunasan PBB 3 Tahun terakhir</li>
                            <li>Form Isian Surat Ijin Pemilik Lahan (jika sewa/kontrak)</li>
                            <li>Fotocopy Akta Tanah/Sertifikat</li>
                            <li>Fotocopy Surat IMB</li>
                            <li>Membuat pernyataan (tidak melakukan usaha) selama izin belum ada/sah</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Register Pensiun</td>
                    <td>
                        <ol>
                            <li>Fotocopy KTP dan Kartu Keluarga</li>
                            <li>Form Pensiun yang telah diisi Pemohon</li>
                            <li>Fotocopy KARIP / Data Pensiunan</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Ahli Waris</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kematian Istri/Suami</li>
                            <li>Fotocopy Surat Nikah Almarhum/almarhumah (bila hilang ada keterangan kehilangan dari kepolisian membuat kutipan Surat Nikah dari KUA)</li>
                            <li>Fotocopy Surat Cerai Almarhum/almarhumah</li>
                            <li>Fotocopy KTP, KK, dan Akta Kelahiran para Ahli Waris</li>
                            <li>Fotocopy Surat Nikah anak/parah Ahli Waris apabila telah meninggal dunia dan mempunyai keturunan (Pernyataan yang diperlukan)</li>
                            <li>Fotocopy KTP 2 orang Saksi yang masih berlaku</li>
                            <li>Fotocopy Bukti Pelunasan PBB atas nama Pemohon</li>
                            <li>Bukti Surat-surat keterangan lain yang dilegalisasi oleh pejabat berwenang</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Usaha</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP</li>
                            <li>Pernyataan memiliki usaha yang diberi materai 6000</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Pindah Datang Luar Kota</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Data Kepindahan yang dikeluarkan oleh daerah asal sampai DISDUKCAPIL</li>
                            <li>Form Isian Pindah Datang Luar Kota dari DISDUKCAPIL</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Pengantar SKCK</td>
                    <td>
                        <ol>
                            <li>Pengantar RT diketahui RW</li>
                            <li>Fotocopy Kartu Keluarga dan KTP</li>
                        </ol>
                    </td>
                </tr>
                <!-- Tambahkan layanan lain sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
</div>
@endsection
