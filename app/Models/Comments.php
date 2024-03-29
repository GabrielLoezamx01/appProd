<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments_seller';
    protected $fillable = ['idpost', 'content', 'id_user'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'idpost');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'id_user');
    }
}
