<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUsers extends Model
{
    protected $fillable = [
        'user_id',
        'codigopostal',
        'nombres',
        'apellidos',
        'telefono',
        'fotodeperfil',
        'estado',
        'ciudad',
        'direccion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
