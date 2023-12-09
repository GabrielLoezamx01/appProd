<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetUser extends Model
{
    use HasFactory;
    protected $table = 'codeReset';

    protected $fillable = [
        'user_id',
        'code',
        'expire'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
