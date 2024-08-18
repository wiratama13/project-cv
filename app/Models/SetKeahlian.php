<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetKeahlian extends Model
{
    use HasFactory;

    protected $table = 'set_keahlian';

    protected $fillable = [
        'nama'
    ];
}
