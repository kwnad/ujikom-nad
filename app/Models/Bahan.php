<?php

namespace App\Models;

use App\Models\WarnaProduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    public function bahan_produk()
    {
        return $this->hasMany(BahanProduk::class);
    }
}
