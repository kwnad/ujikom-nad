<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Warna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaProduk extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }
}
