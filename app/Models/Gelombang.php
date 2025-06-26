<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';

    // Define fillable fields
    protected $fillable = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'biaya'
    ];

    // Correct casting syntax
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}