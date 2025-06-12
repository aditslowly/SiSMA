<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MapelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mapel::with('guru')->get()->map(function ($mapel) {
            return [
                'kode_mapel' => $mapel->kode_mapel,
                'nama_mapel' => $mapel->nama_mapel,
                'deskripsi' => $mapel->deskripsi,
                'guru' => $mapel->guru?->username ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Mapel',
            'Nama Mapel',
            'Deskripsi',
            'Guru'
        ];
    }
}
