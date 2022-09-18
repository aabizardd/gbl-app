<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
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

        $jabatans = Jabatan::all();

        $data = [
            'jabatans' => $jabatans,
        ];

        return view('jabatan.list', $data);
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
        $this->validate($request, [
            'kode' => 'required|unique:jabatans',
            'nama_jabatan' => 'required',
        ]);

        $data = $request->all();

        // dd($data);

        Jabatan::create($data);

        return redirect()->route('jabatan')->with('success', 'Berhasil menambahkan data');
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
        //
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
        $jabatan_id = $request['jabatan_id'];

        $this->validate($request, [
            'kode_update' => 'required|unique:jabatans,kode,' . $jabatan_id,
            'nama_jabatan_update' => 'required',

        ]);

        $data = [
            'kode' => $request['kode_update'],
            'nama_jabatan' => $request['nama_jabatan_update'],
        ];

        Jabatan::find($jabatan_id)->update($data);
        return redirect()->route('jabatan')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Jabatan::find($id);
        $item->delete();

        return redirect()->route('jabatan')->with('success', 'Berhasil menghapus data');
    }
}