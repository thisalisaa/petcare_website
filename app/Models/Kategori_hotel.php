<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_hotel extends Model
{
    use HasFactory;

    protected $fillable = ['pethotel_id', 'nama_kategori', 'harga_kategori', 'diskon_kategori'];

    public function pethotel()
    {
        return $this->belongsTo(Pethotel::class);
    }
}
