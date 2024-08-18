<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about_me';

    protected $fillable = [
        'user_detail_id',
        'tentang',
    ];

    public function user_detail()
    {
        return $this->belongsTo(UserDetail::class,'user_detail_id','id');
    }
}
