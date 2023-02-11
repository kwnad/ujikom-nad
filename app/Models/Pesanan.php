<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Warna;
use App\Models\Image;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $fillable = ['kode_pesanan', 'produk_id', 'warna_id', 'size_s', 'size_m', 'size_l', 'size_xl', 'size_xxl'];
    public $timestamps = true;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class, 'warna_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
