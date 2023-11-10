<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesPost extends Model
{
    protected $table = 'publicacion_imagen';

    protected $fillable = [
        'publicacion_id',
        'ruta',
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }
}
