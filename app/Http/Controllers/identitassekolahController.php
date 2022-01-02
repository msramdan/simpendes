<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identitassekolah;

class identitassekolahController extends Controller
{
    public function index()
    {
        $data = Identitassekolah::all();
        return view('Identitas.identitassekolah', compact('data'));
    }

    public function create()
    {
        return view('Identitas.tambahidentitassekolah');
    }

    public function store(Request $request)
    {
        $data = $request->logo;
        $namaFile = time().rand(100,999).".".$data->getClientOriginalExtension();

        $uploudlogo = new Identitassekolah;
        $uploudlogo->npsn = $request->npsn;
        $uploudlogo->nama_sekolah = $request->nama_sekolah;
        $uploudlogo->nama_kepsek = $request->nama_kepsek;
        $uploudlogo->alamat = $request->alamat;
        $uploudlogo->kabupaten = $request->kabupaten;
        $uploudlogo->kode_pos = $request->kode_pos;
        $uploudlogo->logo = $namaFile;
        $uploudlogo->no_telp = $request->no_telp;

        $data->move(public_path().'/Logo', $namaFile);
        $uploudlogo->save();

        return redirect('identitassekolah')->with('toast_success', 'Data berhasil disimpan!');
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
        $data = Identitassekolah::findorfail($id);
        return view('Identitas.editidentitassekolah', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $ubah = Identitassekolah::findorfail($id);
        $awal = $ubah->logo;

        $data = [
            'npsn' => $request['npsn'],
            'nama_sekolah' => $request['nama_sekolah'],
            'nama_kepsek' => $request['nama_kepsek'],
            'alamat' => $request['alamat'],
            'kabupaten' => $request['kabupaten'],
            'kode_pos' => $request['kode_pos'],
            'logo' => $awal,
            'no_telp' => $request['no_telp'],
        ];

        $request->logo->move(public_path().'/Logo', $awal);
        $ubah->update($data);

        return redirect('identitassekolah')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Identitassekolah::findorfail($id);

        $file = public_path('/Logo/').$hapus->logo;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return back()->with('toast_error', 'Data berhasil dihapus!');
    }
}
