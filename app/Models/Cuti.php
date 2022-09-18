<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cuti extends Model
{
    // use HasFactory;
    protected $table = "cutis";

    protected $fillable = [
        'user_id',
        'dari_tanggal',
        'sampai_tanggal',
        'bagian_id',
        'jabatan_id',
        'keterangan',
        'status',
    ];

    public static function get_cuti($user_id)
    {
        $datas = DB::table('cutis')
            ->join('users', 'users.id', '=', 'cutis.user_id')
            ->select('cutis.*', 'users.nik', 'users.nama_lengkap')
            ->where('user_id', '=', $user_id)
            ->get();

        return $datas;
    }

    public static function get_cuti_all()
    {
        $datas = DB::table('cutis')
            ->join('users', 'users.id', '=', 'cutis.user_id')
            ->select('cutis.*', 'users.nik', 'users.nama_lengkap')
            ->get();

        return $datas;
    }
}