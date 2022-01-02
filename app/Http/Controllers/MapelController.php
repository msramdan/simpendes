<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Karyawan;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        $mapels = Mapel::all();
        return view('mapels.index', [
            'karyawans' => $karyawans,
            'mapels' => $mapels
        ]);
    }

    public function create()
    {
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        return view('mapels.create', [
            'karyawan' => $karyawan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'karyawan_id' => 'required',
        ]);

        Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'karyawan_id' => $request->karyawan_id,
        ]);

        return redirect()->route('mapels.index')
            ->with('toast_success', 'Berhasil menambah mata pelajaran baru');

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
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        $mapel = Mapel::find($id);
        if (!$mapel) return redirect()->route('mapels.index')
            ->with('error_message', 'Mata pelajaran dengan id'.$id.' tidak ditemukan');

        return view('mapels.edit', [
            'karyawan' => $karyawan,
            'mapel' => $mapel
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'karyawan_id' => 'required',
        ]);

        $mapel = Mapel::find($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->karyawan_id = $request->karyawan_id;
        $mapel->save();

        return redirect()->route('mapels.index')
            ->with('toast_success', 'Berhasil mengubah mata pelajaran');
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect()->route('mapels.index')
            ->with('toast_success', 'Berhasil menghapus mata pelajaran');

    }
}
