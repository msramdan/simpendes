<?php

namespace App\Http\Controllers;

use App\Proker;
use App\Tahun;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProkerController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $tahuns = Tahun::all();
        $prokers = Proker::all();
        return view('prokers.index', [
            'users' => $users,
            'tahuns' => $tahuns,
            'prokers' => $prokers
        ]);
    }

    public function create()
    {
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('prokers.create', [
            'tahun' => $tahun
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->file_proker;
        $namaFile = time().rand(100,999).".".$data->getClientOriginalExtension();

        $proker = new Proker;
        $proker->tahun_id = $request->tahun_id;
        $proker->file_proker = $namaFile;
        $proker->keterangan = $request->keterangan;

        $data->move(storage_path().'/app/public/arsip/proker', $namaFile);
        $proker->save();

        return redirect()->route('prokers.index')
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
        $proker = Proker::findorfail($id);
        if (!$proker) return redirect()->route('prokers.index')
            ->with('error_message', 'Proker dengan id'.$id.' tidak ditemukan');

        return view('prokers.edit', [
            'proker' => $proker
        ]);
    }


    public function update(Request $request, $id)
    {
        $ubah = Proker::findorfail($id);
        $awal = $ubah->file_proker;

        $data = [
            'file_proker' => $awal,
        ];

        $request->file_proker->move(public_path().'/storage/arsip/proker', $awal);
        $ubah->update($data);

        return redirect()->route('prokers.index')
            ->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Proker::findorfail($id);

        $file = public_path('/storage/arsip/proker/').$hapus->file_proker;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return redirect()->route('prokers.index')
            ->with('toast_success', 'Data berhasil dihapus!');

    }

    public function download($id)
    {
        $proker = Proker::where('id', $id)->firstOrFail();
        return response()->download(storage_path("app/public/arsip/proker/{$proker->file_proker}"));
    }
}
