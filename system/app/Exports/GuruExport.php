<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
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

    public function headers()
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
