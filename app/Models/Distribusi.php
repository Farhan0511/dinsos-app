<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'foto_penyerahan',
    ];

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
