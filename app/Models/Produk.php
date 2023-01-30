<?php

namespace App\Models;

use App\Models\WarnaProduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $fillable = ['nama'];
    public $timestamps = true;

    public function warna_produk()
    {
        return $this->hasMany(WarnaProduk::class);
    }
}
