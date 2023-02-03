<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // public function pesanan()
    // {
    //     return $this->belongsTo(Pesanan::class);
    // }

    // public function image()
    // {
    //     if ($this->gambar_desain && file_exists(public_path($this->gambar_desain))) {
    //         return asset($this->gambar_desain);
    //     }
    // }

    // public function deleteImage()
    // {
    //     return unlink(public_path($this->gambar_desain));
    // }
}
