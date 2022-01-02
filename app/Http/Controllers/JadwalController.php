<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Tahun;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $tahuns = Tahun::all();
        $jadwals = Jadwal::all();
        return view('jadwals.index', [
            'users' => $users,
            'tahuns' => $tahuns,
            'jadwals' => $jadwals
        ]);
    }

    public function create()
    {
    	$tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('jadwals.create', [
            'tahun' => $tahun
        ]);
    }

    public function store(Request $request)
    {
        $jadwal = $request->file_jadwal;
        $namaFile = time().rand(100,999).".".$jadwal->getClientOriginalExtension();

        $uploudfile = new Jadwal;
        $uploudfile->tahun_id = $request->tahun_id;
        $uploudfile->file_jadwal = $namaFile;
        $uploudfile->keterangan = $request->keterangan;

        $jadwal->move(storage_path().'/app/public/arsip/jadwal', $namaFile);
        $uploudfile->save();

        return redirect()->route('jadwals.index')
            ->with('toast_success', 'Data berhasil ditambahkan!');
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
    	$tahun = Tahun::orderBy('tahun', 'ASC')->get();
        $jadwal = Jadwal::findorfail($id);
        return view('jadwals.edit', [
            'tahun' => $tahun,
            'jadwal' => $jadwal
        ]);
    }

    public function update(Request $request, $id)
    {
        $ubah = Jadwal::findorfail($id);
        $awal = $ubah->file_jadwal;

        $data = [
        	'file_jadwal' => $awal,
        	'tahun_id' => $request['tahun_id'],
        ];

        $request->file_jadwal->move(public_path().'/storage/arsip/jadwal', $awal);
        $ubah->update($data);

        return redirect()->route('jadwals.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Jadwal::findorfail($id);

        $file = public_path('/arsip/jadwal/').$hapus->file_jadwal;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return back()->with('toast_error', 'Data berhasil dihapus!');
    }

    public function download($id)
    {
        $jadwal = Jadwal::where('id', $id)->firstOrFail();
        return response()->download(storage_path("app/public/arsip/jadwal/{$jadwal->file_jadwal}"));
    }
}
