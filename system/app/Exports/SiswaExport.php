<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select(
            'nisn',
            'nis',
            'nama_siswa',
            'jenis_pendaftaran',
            'jalur_pendaftaran',
            'tanggal_masuk',
            'status',
            'kebutuhan_khusus',
            'email',
            'no_kk',
            'nik',
            'jenis_kelamin',
            'agama',
            'tanggal_lahir',
            'tempat_lahir',
            'alamat',
            'rt',
            'rw',
            'dusun',
            'desa_kelurahan',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'telepon',
        )->get();
    }

    public function headings(): array
    {
        return [
            'NISN',
            'NIS',
            'Nama Siswa',
            'Jenis Pendaftaran',
            'Jalur Pendaftaran',
            'Tanggal Masuk',
            'Status',
            'Kebutuhan Khusus',
            'Email',
            'Nomor Kartu Keluarga',
            'NIK',
            'Jenis Kelamin',
            'Agama',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Alamat',
            'RT',
            'RW',
            'Dusun',
            'Desa Kelurahan',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Telepon',
        ];
    }
}
