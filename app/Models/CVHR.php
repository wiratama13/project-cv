<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVHR extends Model
{
    use HasFactory;
    
    protected $table = 'cv_hr';

    protected $fillable = [
        'user_detail_id',
        'keahlian',
    ];

    public function user_detail()
    {
        return $this->belongsTo(UserDetail::class, 'user_detail_id', 'id');
    }
}
