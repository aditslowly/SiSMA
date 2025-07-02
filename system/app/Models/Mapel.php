<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapels';
    protected $keyType = 'int';
    public $incrementing = false;
    protected $fillable = [
        'sekolah_id',
        'kode_mapel',
        'nama_mapel',
        'deskripsi',
    ];

    public function pivot_kelas()
    {
        return $this->belongsToMany(PivotKelas::class, 'pivots_mapel', 'mapel_id', 'pivot_kelas_id')
            ->withTimestamps()
            ->using(PivotMapel::class);
    }
}
