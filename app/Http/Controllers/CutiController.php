<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Cuti;
use App\Models\Jabatan;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
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
        $data_auth = Auth::user();

        $data_bagian = Bagian::all();
        $data_jabatan = Jabatan::all();
        $data_karyawan = User::where('level', '=', 1)->get();

        if (Auth::user()->level == 1) {
            $data_cuti = Cuti::get_cuti($data_auth->id);
        } else {
            $data_cuti = Cuti::get_cuti_all();
        }

        // $count_cuti = Cuti::where('user_id', '=', $data_auth->id)->where('status', '=', 1)->count();
        $count_cuti = Cuti::sum_cuti($data_auth->id);

        // dd($count_cuti);

        $data = [
            'bagians' => $data_bagian,
            'karyawans' => $data_karyawan,
            'jabatans' => $data_jabatan,
            'cutis' => $data_cuti,
            'jml_cuti' => $count_cuti,
        ];

        return view('cuti.index', $data);
    }

    public function delete($id)
    {
        $item = Cuti::find($id);
        $item->delete();

        return redirect()->route('cuti')->with('success', 'Berhasil menghapus data');
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

        $this->validate($request, [
            'user_id' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'bagian_id' => 'required',
            'jabatan_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tgl1 = new DateTime($request['dari_tanggal']);
        $tgl2 = new DateTime($request['sampai_tanggal']);
        $total_hari = $tgl2->diff($tgl1);

        $total_hari = $total_hari->d + 1;

        $data = $request->all();
        $data['total_hari'] = $total_hari;

        // array_push($data, );
        // dd($data);

        Cuti::create($data);

        return redirect()->route('cuti')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {

        $data = [
            'status' => $status,
        ];

        // // User::create($data_user);
        Cuti::find($id)->update($data);
        return redirect()->route('cuti')->with('success', 'Berhasil mengubah status cuti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}