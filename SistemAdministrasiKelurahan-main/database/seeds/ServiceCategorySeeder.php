<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('service_categories')->insert([
            [
                'name' => 'Register KTP',
                'description' => 'Pengantar RT/RW, fotocopy KTP, usia minimal 17 tahun/pernah menikah, KTP lama untuk perpanjangan, surat kehilangan dari kepolisian jika hilang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Register KK',
                'description' => 'Pengantar RT/RW, fotocopy KK, usia minimal 17 tahun/pernah menikah, KTP lama untuk perpanjangan, surat kehilangan jika hilang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Domisili Haji',
                'description' => 'Pengantar RT/RW, fotocopy KK, syarat usia 17 tahun/pernah menikah, KTP lama untuk perpanjangan, surat kehilangan bila hilang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Surat Keterangan Orang Sama',
                'description' => 'Pengantar RT/RW, FC KK & KTP, surat pernyataan/penjelasan diketahui RT/RW, berkas yang terdapat perbedaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Belum Memiliki Rumah',
                'description' => 'Pengantar RT/RW, FC KK & KTP, surat pernyataan belum memiliki rumah diketahui RT/RW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Belum Menikah',
                'description' => 'Pengantar RT/RW, FC KK & KTP, surat pernyataan belum menikah diketahui RT/RW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pindah Datang Dalam Kota',
                'description' => 'Pengantar RT/RW, surat pindah dari kelurahan & kecamatan asal, KK dan KTP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pindah Keluar',
                'description' => 'Pengantar RT/RW, KK & KTP asli, isi form data kelurahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Lahir +30 Hari',
                'description' => 'Pengantar RT/RW, surat pernyataan RT/RW, surat keterangan Disdukcapil, FC KK & KTP pelapor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan SKTM Pendidikan',
                'description' => 'Pengantar RT/RW, FC KK & KTP orang tua, surat pernyataan tidak mampu, keterangan sekolah, foto rumah dan keluarga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan SKTM Umum',
                'description' => 'Pengantar RT/RW, FC KK & KTP pemohon, surat pernyataan tidak mampu diketahui RT/RW, foto rumah dan keluarga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Lahir -30 Hari',
                'description' => 'Pengantar RT/RW, surat lahir bidan/RS, FC surat nikah, KK & KTP orang tua, form Disdukcapil, FC KTP saksi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Domisili Yayasan',
                'description' => 'Pengantar RT/RW, FC KK & KTP ketua yayasan, akta pendirian, denah lokasi, ijin tetangga RT/RW, bukti PBB 3 tahun terakhir, surat ijin pemilik lahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Domisili Perusahaan',
                'description' => 'Pengantar RT/RW, FC KK & KTP direktur, akta notaris, denah lokasi, ijin tetangga RT/RW, bukti PBB 3 tahun terakhir, ijin pemilik lahan, akta tanah, IMB, pernyataan usaha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Register Pensiun',
                'description' => 'FC KTP & KK, form pensiun yang sudah diisi, FC KARIP/data pensiunan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Ahli Waris',
                'description' => 'Pengantar RT/RW, FC surat kematian, surat nikah/cerai, KTP, KK & akta kelahiran ahli waris, surat nikah anak ahli waris, KTP saksi, bukti PBB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keterangan Usaha',
                'description' => 'Pengantar RT/RW, FC KK & KTP, surat pernyataan memiliki usaha bermaterai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pindah Datang Luar Kota',
                'description' => 'Pengantar RT/RW, data kepindahan dari daerah asal hingga Disdukcapil, form pindah datang luar kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengantar SKCK',
                'description' => 'Pengantar RT/RW, FC KK & KTP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}