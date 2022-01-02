<?php

namespace App\Http\Controllers;

use App\Sk;
use App\Tahun;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $tahuns = Tahun::all();
        $sk = Sk::all();
        return view('sks.index', [
            'users' => $users,
            'tahuns' => $tahuns,
            'sk' => $sk
        ]);
    }

    public function create()
    {
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('sks.create', [
            'tahun' => $tahun
        ]);
    }

    public function store(Request $request)
    {
        $sk = $request->file_sk;
        $namaFile = time().rand(100,999).".".$sk->getClientOriginalExtension();

        $uploudfile = new Sk;
        $uploudfile->tahun_id = $request->tahun_id;
        $uploudfile->file_sk = $namaFile;
        $uploudfile->keterangan = $request->keterangan;

        $sk->move(storage_path().'/app/public/arsip/sk', $namaFile);
        $uploudfile->save();

        return redirect()->route('sks.index')
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
        $sk = Sk::findorfail($id);
        return view('sks.edit', compact('sk'));
    }

    public function update(Request $request, $id)
    {
        $ubah = Sk::findorfail($id);
        $awal = $ubah->file_sk;

        $data = [
            'file_sk' => $awal,
        ];

        $request->file_sk->move(public_path().'/storage/arsip/sk', $awal);
        $ubah->update($data);

        return redirect()->route('sks.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Sk::findorfail($id);

        $file = public_path('/storage/arsip/sk/').$hapus->file_sk;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return back()->with('toast_error', 'Data berhasil dihapus!');
    }

    public function download($id)
    {
        $sk = Sk::where('id', $id)->firstOrFail();
        return response()->download(storage_path("app/public/arsip/sk/{$sk->file_sk}"));
    }
}
