<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';

    protected $fillable = ['nama', 'periode', 'biaya'];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}
