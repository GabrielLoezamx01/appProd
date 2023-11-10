<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesPost extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id', 'publicacion_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }
}
