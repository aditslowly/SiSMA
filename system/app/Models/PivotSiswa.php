<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PivotSiswa extends Pivot
{
    protected $table = 'anggota_kelas';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'pivot_kelas_id',
        'siswa_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function pivot_kelas()
    {
        return $this->belongsTo(PivotKelas::class, 'pivot_kelas_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
