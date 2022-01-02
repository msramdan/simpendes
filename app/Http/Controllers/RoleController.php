<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_karyawan' => 'required',
        ]);

        Role::create([
            'role_karyawan' => $request->role_karyawan,
        ]);

        return redirect()->route('roles.index')
            ->with('toast_success', 'Berhasil menambah role baru');

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
        $role = Role::find($id);
        if (!$role) return redirect()->route('roles.index')
            ->with('error_message', 'Role dengan id'.$id.' tidak ditemukan');

        return view('roles.edit', [
            'role' => $role
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role_karyawan' => 'required',
        ]);

        $role = Role::find($id);
        $role->role_karyawan = $request->role_karyawan;
        $role->save();

        return redirect()->route('mapels.index')
            ->with('toast_success', 'Berhasil mengubah mata pelajaran');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('toast_success', 'Berhasil menghapus role');

    }
}
