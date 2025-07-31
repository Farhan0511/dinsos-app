<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $fillable = [
        'id_user', 'jenisBantuan', 'status', 'tanggal_pengambilan'
    ];

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
