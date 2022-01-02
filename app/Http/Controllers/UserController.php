<?php

namespace App\Http\Controllers;

use DataTables;
use App\User;
use App\Karyawan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        $user = User::orderBy('name', 'ASC')->get();
        return view('users.index', [
            'karyawans' => $karyawans,
            'user' => $user
        ]);
    }

    public function create()
    {
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        return view('users.create', [
            'karyawan' => $karyawan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
            'karyawan_id' => 'required',
    		'level' => 'required',
    		'email' => 'required|unique:users',
    		'password' => 'required|min:6',
    	]);

        User::create([
            'name' => $request->name,
            'karyawan_id' => $request->karyawan_id,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users')->with('toast_success','Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        $user = User::findorfail($id);
        return view('users.edit', [
            'karyawan' => $karyawan,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
    		'name' => 'required',
    		'email' => "required|unique:users,email,$id",
    	]);

        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users')->with('toast_success','Data Berhasil Diupdate!');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }

}
