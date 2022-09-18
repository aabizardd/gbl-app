<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karyawan extends Model
{
    // use HasFactory;

    protected $table = "karyawans";

    protected $fillable = [
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'bagian_id',
        'jabatan_id',
        'user_id',
    ];

    public static function get_detail_karyawan($user_id)
    {

        $datas = DB::table('karyawans')
            ->join('users', 'users.id', '=', 'karyawans.user_id')
            ->join('bagians', 'bagians.id', '=', 'karyawans.bagian_id')
            ->join('jabatans', 'jabatans.id', '=', 'karyawans.jabatan_id')
        // ->select('cutis.*', 'users.nik', 'users.nama_lengkap')
            ->where('user_id', '=', $user_id)
            ->first();

        return $datas;
    }

    public static function get_detail_karyawan_all()
    {

        $datas = DB::table('karyawans')
            ->leftJoin('users', 'users.id', '=', 'karyawans.user_id')
            ->leftJoin('bagians', 'bagians.id', '=', 'karyawans.bagian_id')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.jabatan_id')
            ->select('karyawans.*', 'users.*', 'bagians.*', 'jabatans.*', 'karyawans.id')
            ->get();

        return $datas;
    }

    public static function get_detail_karyawan_by_id($karyawan_id)
    {

        $datas = DB::table('karyawans')
            ->leftJoin('users', 'users.id', '=', 'karyawans.user_id')
            ->leftJoin('bagians', 'bagians.id', '=', 'karyawans.bagian_id')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.jabatan_id')
            ->select('karyawans.*', 'users.*', 'bagians.*', 'jabatans.*', 'karyawans.id')
            ->where('karyawans.id', '=', $karyawan_id)
            ->first();

        return $datas;
    }
}