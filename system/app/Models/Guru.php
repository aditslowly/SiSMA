<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    protected $table = 'gurus';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'username',
        'nip',
        'password',
        'jenis_kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'email',
        'jabatan',
        'status',
        'pendidikan_terakhir',
        'tahun_masuk',
        'foto_profil',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = (string) Str::uuid();
        });
    }


    public function mapels()
    {
        return $this->hasMany(Mapel::class, 'mapel_id');
    }

    public function kelas_diwalikan()
    {
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }
}
