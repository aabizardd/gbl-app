<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $data_diri = Karyawan::get_detail_karyawan(Auth::user()->id);
        // dd($data_diri->nik);

        $data = [
            'data_diri' => $data_diri,
        ];

        return view('karyawan.profile', $data);
    }

}