<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsClients extends Model
{
    use HasFactory;
    protected $table = 'comments_clients';
    protected $fillable = ['idpost', 'content', 'id_user'];

    public function post()
    {
        return $this->belongsTo(PublicacionesClientes::class, 'idpost');
    }

    public function data()
    {
        return $this->belongsTo(DataUsers::class, 'id_user');
    }
}
