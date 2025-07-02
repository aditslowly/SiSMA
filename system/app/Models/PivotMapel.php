<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PivotMapel extends Pivot
{
    protected $table = 'pivots_mapel';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $keyType = 'string';

    protected $fillable = [
        'pivot_kelas_id',
        'mapel_id',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(PivotKelas::class, 'pivot_kelas_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
