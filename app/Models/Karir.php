<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;

    protected $table='karir';

    protected $fillable = [
        'user_detail_id',
        'posisi',
        'perusahaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
    ];

    public function user_detail()
    {
        return $this->belongsTo(UserDetail::class,'user_detail_id','id');
    }
}
