<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'tanggal',
        'kategori',
        'gambar',
        'isi',
        'id_user'
    ];

    protected $dates = ['tanggal'];

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
