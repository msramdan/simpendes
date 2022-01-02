<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Karyawan;
use App\Tahun;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
    	$karyawans = Karyawan::all();
        $tahuns = Tahun::all();
        $kelass = Kelas::all();
        return view('kelass.index', [
            'karyawans' => $karyawans,
            'tahuns' => $tahuns,
            'kelass' => $kelass
        ]);
    }

    public function create()
    {
    	$karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('kelass.create', [
            'karyawan' => $karyawan,
            'tahun' => $tahun
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'tahun_id' => 'required',
            'karyawan_id' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'tahun_id' => $request->tahun_id,
            'karyawan_id' => $request->karyawan_id,
        ]);

        return redirect()->route('kelass.index')
            ->with('toast_success', 'Berhasil menambah kelas baru');

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
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        $kelas = Kelas::find($id);
        if (!$kelas) return redirect()->route('kelass.index')
            ->with('error_message', 'Kelas dengan id'.$id.' tidak ditemukan');

        return view('kelass.edit', [
            'karyawan' => $karyawan,
        	'tahun' => $tahun,
            'kelas' => $kelas
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'tahun_id' => 'required',
            'karyawan_id' => 'required',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->tahun_id = $request->tahun_id;
        $kelas->karyawan_id = $request->karyawan_id;
        $kelas->save();

        return redirect()->route('kelass.index')
            ->with('toast_success', 'Berhasil mengubah kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect()->route('kelass.index')
            ->with('toast_success', 'Berhasil menghapus kelas');

    }
}
