<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    public $timestamps = false;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'telepon',
        'email',
        'asal_sekolah',
        'jurusan',
        'nama_ortu',
        'pekerjaan_ortu',
        'penghasilan_ortu',
        'alamat_ortu',
        'pendidikan_ortu',
        'telepon_ortu',
        'status_verifikasi',
        'gelombang_id'
    ];

    public function dokumen()
    {
        return $this->hasOne(DokumenSiswa::class, 'nisn', 'nisn');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'nisn', 'nisn');
    }
    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }
}
