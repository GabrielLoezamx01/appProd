<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'direccion',
        'codigo_postal',
        'rango_estrellas',
        'imagen_url',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
