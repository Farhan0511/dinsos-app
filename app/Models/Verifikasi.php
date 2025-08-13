<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'foto_rumah', 'foto_diri', 'status', 'tanggal_pengambilan'
    ];

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
