<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::select(
            'nip',
            'nama',
            'username',
            'password',
            'email',
            'no_telepon',
            'alamat',
            'tanggal_lahir',
            'tempat_lahir',
            'jenis_kelamin',
            'agama',
            'status'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Username',
            'Password',
            'Email',
            'No Telepon',
            'Alamat',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Jenis Kelamin',
            'Agama',
            'Status',
        ];
    }
}
