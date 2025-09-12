<?php

namespace App\Exports;

use App\Staff;   
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Staff::select(
            'nik',
            'full_name',
            'nip',
            'nipd',
            'nomor_sk_angkat',
            'tgl_sk_angkat',
            'nomor_sk_henti',
            'tgl_sk_henti',
            'position_period',
            'pangkat',
            'staff_position'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Lengkap',
            'NIP',
            'NIPD',
            'Nomor SK Pengangkatan',
            'Tanggal SK Pengangkatan',
            'Nomor SK Pemberhentian',
            'Tanggal SK Pemberhentian',
            'Masa Jabatan',
            'Pangkat',
            'Jabatan',
        ];
    }
}
