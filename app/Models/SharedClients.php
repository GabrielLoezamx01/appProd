<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedClients extends Model
{
    use HasFactory;
    protected $table = 'shared_clients';
    protected $fillable = ['user_id', 'id_post'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
