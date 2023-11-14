<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickesPost extends Model
{
    protected $table = 'publicacion_etiqueta';

    public $timestamps = true;

    protected $fillable = ['publicacion_id', 'etiqueta_id'];

    public function publicacion()
    {
        return $this->belongsTo(Post::class, 'publicacion_id', 'id');
    }

    public function etiqueta()
    {
        return $this->belongsTo(Tag::class, 'etiqueta_id', 'id');
    }
}
