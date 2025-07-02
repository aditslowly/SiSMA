<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PivotKelas extends Pivot
{
    protected $table = 'pivots_kelas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $keyType = 'string';

    protected $fillable = [
        'pivot_guru_id',
        'kelas_id',
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'anggota_kelas', 'pivot_kelas_id', 'siswa_id')
            ->withTimestamps()
            ->using(PivotSiswa::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'pivots_mapel', 'pivot_kelas_id', 'mapel_id')
            ->withTimestamps()
            ->using(PivotMapel::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
