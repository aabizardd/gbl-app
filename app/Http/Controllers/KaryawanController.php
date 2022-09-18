<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
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

        $all_karyawan = Karyawan::get_detail_karyawan_all();

        $data = [
            'karyawans' => $all_karyawan,
        ];

        return view('karyawan.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $karyawan_detail = Karyawan::get_detail_karyawan_by_id($id);
        $all_bagian = Bagian::all();
        $all_jabatan = Jabatan::all();

        $data = [
            'karyawan' => $karyawan_detail,
            'bagians' => $all_bagian,
            'jabatans' => $all_jabatan,
        ];

        // dd($karyawan_detail);

        return view('karyawan.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id_karyawan = $request['karyawan_id'];

        $get_karyawan = Karyawan::find($id_karyawan);
        // $get_user = User::find($get_karyawan->user_id);
        // dd($get_user);

        $this->validate($request, [
            'nik' => 'required|unique:users,nik,' . $get_karyawan->user_id,
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'bagian' => 'required',
            'jabatan' => 'required',
        ]);

        $data_user = [
            'nik' => $request['nik'],
            'nama_lengkap' => $request['nama_lengkap'],
        ];

        $data_karyawan = [
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'agama' => $request['agama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'bagian_id' => $request['bagian'],
            'jabatan_id' => $request['jabatan'],
        ];
        // dd($request['nik']);

        // $data = $request->all();

        // jabatan::find($jabatan_id)->update($data);

        User::find($get_karyawan->user_id)->update($data_user);
        Karyawan::find($get_karyawan->id)->update($data_karyawan);

        return redirect()->route('karyawan')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Karyawan::find($id);
        $user_id = $item->user_id;
        // dd($item->user_id);
        $item2 = User::find($user_id);

        $item->delete();
        $item2->delete();

        return redirect()->route('karyawan')->with('success', 'Berhasil menghapus data');
    }
}