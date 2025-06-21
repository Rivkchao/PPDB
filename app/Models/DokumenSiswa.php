<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenSiswa extends Model
{
    protected $table = 'dokumen_siswa';
    public $timestamps = false;

    protected $fillable = [
        'nisn', 'pas_foto', 'scan_ijazah', 'scan_kk', 'scan_akta', 'scan_kelakuan'
    ];
}
