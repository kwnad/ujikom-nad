<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $fillable = ['kode_pesanan', 'total_pesanan'];
    public $timestamps = true;
}
