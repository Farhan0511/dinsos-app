<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'tanggal_terima',
    ];
}
