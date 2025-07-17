<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'nama',
        'email',
        'alamat',
        'jenis_kelamin',
        'jenis_bantuan',
        'no_telepon',
        'foto_penyerahan',
    ];
}
