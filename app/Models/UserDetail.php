<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_detail';

    protected $fillable = [
        'user_id',
        'name',
        'foto',
        'posisi',
        'email',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
