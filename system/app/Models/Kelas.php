<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    public $incrementing = false;
    protected $fillable = [
        'sekolah_id',
        'nama_kelas',
        'tingkat',
        'jurusan',
        'wali_kelas_id',
    ];

    public function wali_kelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
}
