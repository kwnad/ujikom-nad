<?php

namespace App\Models;

use App\Models\Produk;

use App\Models\BahanProduk;
use App\Models\WarnaProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bahan extends Model
{
    use HasFactory;

    public function produks()
    {
        return $this->belongsToMany(Produk::class)->as('produks');
    }

    public function warnaProduk()
    {
        return $this->hasMany(BahanProduk::class,'bahan_id');
    }
}
