<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Siswa extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'siswas';
    protected $fillable = [
        'sekolah_id',
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
        'password',
        'foto',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
