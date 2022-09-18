<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    // use HasFactory;
    protected $table = "jabatans";

    protected $fillable = [
        'kode',
        'nama_jabatan',
    ];
}