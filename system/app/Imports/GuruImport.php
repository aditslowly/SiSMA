<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\DateFormatter;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'sekolah_id' => Auth::guard('admin')->user()->sekolah_id,
            'username' => $row[1],
            'nip' => $row[2],
            'jenis_kelamin' => $row[3],
            'agama' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'alamat' => $row[7],
            'no_telepon' => $row[8],
            'email' => $row[9],
            'mata_pelajaran' => $row[10],
            'jabatan' => $row[11],
            'pendidikan_terakhir' => $row[12],
            'tahun_masuk' => $row[13],
            'password' => bcrypt($row[14]),
            'foto_profil' => $row[15],
        ]);
    }

    private function perseTanggal($value)
    {
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value);
        }

        return DateFormatter('Y-m-d', $value) ?: now();
    }

    public function headingRow(): int
    {
        return 2;
    }
}

