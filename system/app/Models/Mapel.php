<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mapel extends Model
{
    protected $table = 'mapels';
    protected $keyType = 'int';
    public $incrementing = false;
    protected $fillable = [
        'guru_id',
        'kode_mapel',
        'nama_mapel',
        'deskripsi',
    ];

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
