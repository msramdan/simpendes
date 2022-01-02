<?php

namespace App\Http\Controllers;

use App\Silabus;
use App\Tahun;
use App\Mapel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SilabusController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $mapels = Mapel::all();
        $tahuns = Tahun::all();
        $silabuss = Silabus::all();
        return view('silabuss.index', [
            'users' => $users,
            'mapels' => $mapels,
            'tahuns' => $tahuns,
            'silabuss' => $silabuss
        ]);
    }

    public function create()
    {
        $mapel = Mapel::orderBy('nama_mapel', 'ASC')->get();
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('silabuss.create', [
            'mapel' => $mapel,
            'tahun' => $tahun
        ]);
    }

    public function store(Request $request)
    {
        $silabus = $request->file_silabus;
        $namaFile = time().rand(100,999).".".$silabus->getClientOriginalExtension();

        $uploudfile = new Silabus;
        $uploudfile->tahun_id = $request->tahun_id;
        $uploudfile->mapel_id = $request->mapel_id;
        $uploudfile->file_silabus = $namaFile;

        $silabus->move(storage_path().'/app/public/arsip/silabus', $namaFile);
        $uploudfile->save();

        return redirect()->route('silabuss.index')
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
        $silabus = Silabus::findorfail($id);
        return view('silabuss.edit', compact('silabus'));
    }

    public function update(Request $request, $id)
    {
        $ubah = Silabus::findorfail($id);
        $awal = $ubah->file_silabus;

        $data = [
            'file_silabus' => $awal,
        ];

        $request->file_silabus->move(public_path().'/storage/arsip/silabus', $awal);
        $ubah->update($data);

        return redirect()->route('silabuss.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Silabus::findorfail($id);

        $file = public_path('/storage/arsip/silabus/').$hapus->file_silabus;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return back()->with('toast_error', 'Data berhasil dihapus!');
    }

    public function download($id)
    {
        $silabus = Silabus::where('id', $id)->firstOrFail();
        return response()->download(storage_path("app/public/arsip/silabus/{$silabus->file_silabus}"));
    }
}
