<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['name', 'estado'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
