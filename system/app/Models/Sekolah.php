<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolahs';
    protected $keyType = 'integer';
    public $incrementing = false;
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'akreditasi',
        'kurikulum',
        'kepala_sekolah',
        'alamat_lengkap',
        'email',
        'telepon',
        'status',
        'kepemilikan_sekolah',
        'status_aktif',
        'tahun_berdiri',
        'jumlah_guru',
        'jumlah_siswa',
        'ruang_kelas',
        'ruang_perpustakaan',
        'ruang_lab',
        'ruang_pimpinan',
        'ruang_guru',
        'tempat_ibadah',
        'ruang_uks',
        'toilet',
        'ruang_tata_usaha',
        'ruang_konseling',
        'logo_sekolah',
        'foto_sekolah'
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class, 'sekolah_id');
    }
}
