<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class PivotGuru extends Pivot
{
    protected $table = 'pivots_guru';
    protected $primaryKey = 'id';
    public $timestamps = true;


    protected $fillable = [
        'guru_id',
        'tahun_ajar_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
