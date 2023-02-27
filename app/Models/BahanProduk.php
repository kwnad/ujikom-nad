<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Bahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanProduk extends Model
{
    use HasFactory;

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}
