<?php

namespace App\Http\Controllers;

use App\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahuns = Tahun::all();
        return view('tahuns.index', [
            'tahuns' => $tahuns
        ]);
    }

    public function create()
    {
        return view('tahuns.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        Tahun::create([
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('tahuns.index')
            ->with('toast_success', 'Berhasil menambah tahun baru');

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
        $tahun = Tahun::find($id);
        if (!$tahun) return redirect()->route('tahuns.index')
            ->with('error_message', 'Tahun dengan id'.$id.' tidak ditemukan');

        return view('tahuns.edit', [
            'tahun' => $tahun
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        $tahun = Tahun::find($id);
        $tahun->tahun = $request->tahun;
        $tahun->save();

        return redirect()->route('tahuns.index')
            ->with('toast_success', 'Berhasil mengubah tahun');
    }

    public function destroy(Request $request, $id)
    {
        $tahun = Tahun::find($id);
        $tahun->delete();

        return redirect()->route('tahuns.index')
            ->with('toast_success', 'Berhasil menghapus tahun');

    }
}
