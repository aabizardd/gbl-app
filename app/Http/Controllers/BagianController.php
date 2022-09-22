<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
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

        $bagians = Bagian::all();

        // SELECT * FROM bagians

        $data = [
            'bagians' => $bagians,
        ];

        return view('bagian.list', $data);
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
            'kode' => 'required|unique:bagians',
            'nama_bagian' => 'required',
        ]);

        $data = $request->all();

        // $kode = $request['kode'];

        // dd($data);

        Bagian::create($data);

        return redirect()->route('bagian')->with('success', 'Berhasil menambahkan data');
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

        $bagian_id = $request['bagian_id'];

        $this->validate($request, [
            'kode_update' => 'required|unique:bagians,kode,' . $bagian_id,
            'nama_bagian_update' => 'required',

        ]);

        $data = [
            'kode' => $request['kode_update'],
            'nama_bagian' => $request['nama_bagian_update'],
        ];

        Bagian::find($bagian_id)->update($data);
        return redirect()->route('bagian')->with('success', 'Berhasil mengubah data');

        // $data = $request->all();
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
        $item = Bagian::find($id);
        $item->delete();

        return redirect()->route('bagian')->with('success', 'Berhasil menghapus data');
    }
}