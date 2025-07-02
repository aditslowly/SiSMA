<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Kelas extends Model
{
    protected $table = 'kelas';
    public $timestamps = true;
    protected $fillable = [
        'sekolah_id',
        'nama_kelas',
        'tingkat',
        'jurusan',
    ];

    public function pivot_guru()
    {
        return $this->belongsToMany(PivotGuru::class, 'pivots_kelas', 'kelas_id', 'pivot_guru_id')
            ->withTimestamps()
            ->using(PivotKelas::class);
    }
}
