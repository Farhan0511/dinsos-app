<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $fillable = [
        'id_user', 'jenisBantuan', 'status'
    ];

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
