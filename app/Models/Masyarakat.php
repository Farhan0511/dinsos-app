<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakats';

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'jenisKelamin',
        'jenisBantuan',
        'nomorTelepon',
    ];
}
