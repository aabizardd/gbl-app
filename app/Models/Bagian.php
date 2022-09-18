<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    // use HasFactory;

    protected $table = "bagians";

    protected $fillable = [
        'kode',
        'nama_bagian',
    ];
}