<?php

namespace App\Models;

use App\Models\Gambar;
use App\Models\Pesanan;
use App\Models\WarnaProduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function warna_produk()
    {
        return $this->hasMany(WarnaProduk::class);
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
