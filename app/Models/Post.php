<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'publicaciones';

    protected $fillable = [
        'sucursal_id',
        'contenido',
        'fecha_publicacion',
        'me_gusta',
        'created_at',
        'update_at'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
    public function likes()
    {
        return $this->hasMany(LikesPost::class, 'publicacion_id');
    }
    public function images()
    {
        return $this->hasMany(ImagesPost::class, 'publicacion_id');
    }
    public function tickes()
    {
        return $this->hasMany(TickesPost::class, 'publicacion_id');
    }
}
