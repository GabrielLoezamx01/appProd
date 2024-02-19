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
        return $this->belongsTo(User::class, 'idpost');

    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
