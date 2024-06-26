<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pet',
        'nama_owner',
        'temperatur',
        'grooming_service',
        'tanggal_grooming',
        'kulit',
        'bulu',
        'telinga',
        'catatan',
    ];
}
