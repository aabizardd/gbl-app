<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

        if (Auth::user()) {
            // dd(Auth::user()->level);
            if (Auth::user()->level != 4) {
                return redirect()->route('home');
            }
        }

        //
        $users = User::all();
        $levels = ['Karyawan', 'HRD', 'Asman', 'Admin'];

        $data = [
            'users' => $users,
            'levels' => $levels,
        ];

        return view('user.list', $data);

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
            'nik' => 'required|unique:users',
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'level' => 'required',
            'password' => 'required|min:6',
        ]);

        // dd($request['password']);

        $data = [
            'nik' => $request['nik'],
            'nama_lengkap' => $request['nama_lengkap'],
            'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ];

        $id_user = User::create($data);

        // dd($id_user->id);

        if ($request['level'] == 1) {

            $data_karyawan = [
                'user_id' => $id_user->id,
            ];

            Karyawan::create($data_karyawan);
        }

        return redirect()->route('user')->with('success', 'Berhasil menambahkan data');
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
        $user = User::find($id);

        $levels = ['Karyawan', 'HRD', 'Asman', 'Admin'];

        $data = [
            'user' => $user,
            'levels' => $levels,
        ];

        // dd($karyawan_detail);

        return view('user.edit', $data);
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

        $user_id = $request['user_id'];
        $user_detail = User::find($user_id);

        $this->validate($request, [
            'nik' => 'required|unique:users,nik,' . $user_id,
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username,' . $user_id,
            'email' => 'required|unique:users,email,' . $user_id,
            'level' => 'required',
            'password' => 'required|min:6',
        ]);

        $pass = "";
        if ($request['password'] == $user_detail->password) {
            $pass = $request['password_old'];
        } else {
            $pass = Hash::make($request['password']);
        }

        $data = [
            'nik' => $request['nik'],
            'nama_lengkap' => $request['nama_lengkap'],
            'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => $pass,
        ];

        User::find($user_id)->update($data);

        return redirect()->route('user')->with('success', 'Berhasil mengubah data');

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

        $item = User::find($id);

        if ($item->level == 1) {
            $item2 = Karyawan::where('user_id', '=', $item->id)->first();
            // dd($item2->id);
            $item2->delete();
        }
        $item->delete();

        return redirect()->route('user')->with('success', 'Berhasil menghapus data');
    }
}