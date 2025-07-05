<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapels';
    public $incrementing = false;
    protected $fillable = [
        'sekolah_id',
        'kode_mapel',
        'nama_mapel',
        'deskripsi',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function pivot_kelas()
    {
        return $this->belongsToMany(PivotKelas::class, 'pivots_mapel', 'mapel_id', 'pivot_kelas_id')
            ->withTimestamps()
            ->using(PivotMapel::class);
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_mapel', 'mapel_id', 'guru_id')
            ->withTimestamps()
            ->using(GuruMapel::class);
    }
}
