<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Cuti;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_auth = Auth::user();

        if (Auth::user()->level == 1) {

            $count_cuti = Cuti::where('user_id', '=', $data_auth->id)->where('status', '=', 1)->count();
            $data_cuti = Cuti::where('user_id', '=', $data_auth->id)->count();

            $data = [
                'kuota_cuti' => 12 - $count_cuti,
                'jml_pengajuan_cuti' => $data_cuti,
            ];

        } elseif (Auth::user()->level == 2) {
            // $count_cuti = Cuti::where('user_id', '=', $data_auth->id)->where('status', '=', 1)->count();
            $jml_karyawan = Karyawan::all()->count();
            $jml_bagian = Bagian::all()->count();
            $jml_jabatan = Jabatan::all()->count();

            $data_cuti = Cuti::all()->count();

            $data = [
                'jml_karyawan' => $jml_karyawan,
                'jml_bagian' => $jml_bagian,
                'jml_jabatan' => $jml_jabatan,
                'jml_pengajuan_cuti' => $data_cuti,
            ];
        } elseif (Auth::user()->level == 3) {
            // $count_cuti = Cuti::where('user_id', '=', $data_auth->id)->where('status', '=', 1)->count();
            $jml_karyawan = Karyawan::all()->count();
            $jml_bagian = Bagian::all()->count();
            $jml_jabatan = Jabatan::all()->count();

            $cuti_now = Cuti::where('status', '=', 1)->count();

            $data = [
                'jml_karyawan' => $jml_karyawan,
                'jml_bagian' => $jml_bagian,
                'jml_jabatan' => $jml_jabatan,
                'jml_cuti_hari_ini' => $cuti_now,
            ];
        } else {
            $jml_karyawan = Karyawan::all()->count();
            $jml_bagian = Bagian::all()->count();
            $jml_jabatan = Jabatan::all()->count();

            $jml_user = User::all()->count();

            $data = [
                'jml_karyawan' => $jml_karyawan,
                'jml_bagian' => $jml_bagian,
                'jml_jabatan' => $jml_jabatan,
                'jml_user' => $jml_user,
            ];
        }

        return view('home.home', $data);
    }
}