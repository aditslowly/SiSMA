<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TahunAjar extends Model
{
    protected $table = 'tahun_ajars';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'sekolah_id',
        'tahun_ajar',
        'deskripsi',
        'dokumen',
        'status',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'pivots_guru', 'tahun_ajar_id', 'guru_id')
            ->withTimestamps()
            ->using(PivotGuru::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
