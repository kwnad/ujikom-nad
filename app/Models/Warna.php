<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\WarnaProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warna extends Model
{
    use HasFactory;
    // public $fillable = ['nama_warna'];

    protected $table = 'warnas';
     
    public $timestamps = true;

    public function produks()
    {
        return $this->belongsToMany(Produk::class)->as('produks');
    }

    public function warnaProduk()
    {
        return $this->hasMany(WarnaProduk::class,'warna_id');
    }
}
