<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pethotel extends Model
{
    protected $fillable = ['nama_produk'];

    public function kategori_hotel()
    {
        return $this->hasMany(Kategori_hotel::class, 'pethotel_id'); // pastikan kolom foreign key sesuai
    }
}
