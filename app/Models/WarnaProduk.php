<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Warna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaProduk extends Model
{
    use HasFactory;
    protected $table = 'warna_produks';
    protected $fillable = ['produk_id', 'warna_id'];

    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }
}
