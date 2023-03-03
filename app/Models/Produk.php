<?php

namespace App\Models;

use App\Models\Warna;
use App\Models\Gambar;
use App\Models\Pesanan;
use App\Models\WarnaProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    public function warnas()
    {
        return $this->belongsToMany(Warna::class)->as('warnas');
    }

    public function warnaProduk()
    {
        return $this->hasMany(WarnaProduk::class,'produk_id');
    }

    public function bahans()
    {
        return $this->belongsToMany(Bahan::class)->as('bahans');
    }

    public function bahanProduk()
    {
        return $this->hasMany(BahanProduk::class,'produk_id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function gambar()
    {
        return $this->hasMany(Gambar::class);
    }
}
