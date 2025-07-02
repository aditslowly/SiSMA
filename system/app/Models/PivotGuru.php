<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class PivotGuru extends Pivot
{
    protected $table = 'pivots_gurus';
    protected $primaryKey = 'id';
    public $timestamps = true;


    protected $fillable = [
        'guru_id',
        'tahun_ajar_id',
    ];

    public function pivot_kelas()
    {
        return $this->hasMany(PivotKelas::class, 'pivot_guru_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function tahun_ajar()
    {
        return $this->belongsTo(TahunAjar::class, 'tahun_ajar_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
