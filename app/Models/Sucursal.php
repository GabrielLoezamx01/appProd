<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'nombre', 'direccion', 'codigo_postal', 'rango_estrellas', 'imagen_url', 'usuario_id',
        'lunes_inicio', 'lunes_fin', 'martes_inicio', 'martes_fin', 'miercoles_inicio', 'miercoles_fin',
        'jueves_inicio', 'jueves_fin', 'viernes_inicio', 'viernes_fin', 'sabado_inicio', 'sabado_fin',
        'domingo_inicio', 'domingo_fin', 'img_portada', 'facebook', 'tiktok', 'instagram', 'twitter',
        'whatsapp', 'correo', 'acerca_de_nosotros', 'estado', 'ciudad'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
