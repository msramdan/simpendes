<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Siswa;
use App\Mapel;
use PDF;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $siswas = Siswa::all();
        $mapels = Mapel::all();
        $nilais = Nilai::all();
        return view('nilais.index', [
            'users' => $users,
            'siswas' => $siswas,
            'mapels' => $mapels,
            'nilais' => $nilais
        ]);
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa','ASC')->get();
        $mapel = Mapel::orderBy('nama_mapel','ASC')->get();
        return view('nilais.create', [
            'siswa' => $siswa,
            'mapel' => $mapel
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
    		'siswa_id' => 'required',
    		'mapel_id' => 'required',
            'uas' => 'required',
            'uts' => 'required',
            'uh1' => 'required',
            'uh2' => 'required',
            'uh3' => 'required',
            'uh4' => 'required',
            'semester' => 'required',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'uas' => $request->uas,
            'uts' => $request->uts,
            'uh1' => $request->uh1,
            'uh2' => $request->uh2,
            'uh3' => $request->uh3,
            'uh4' => $request->uh4,
            'semester' => $request->semester,
        ]);

        return redirect()->route('nilais.index')
            ->with('toast_success', 'Data berhasil disimpan!');

    }

    public function show()
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();
        $nilais = Nilai::all();
        return view('nilais.show', [
            'siswas' => $siswas,
            'mapels' => $mapels,
            'nilais' => $nilais
        ]);
    }

    public function edit($id)
    {
    	$siswa = Siswa::orderBy('nipd', 'ASC')->get();
    	$mapel = Mapel::orderBy('nama_mapel', 'ASC')->get();
        $nilai = Nilai::find($id);
        if (!$nilai) return redirect()->route('nilais.index')
            ->with('error_message', 'Nilai dengan id'.$id.' tidak ditemukan');

        return view('nilais.edit', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            'nilai' => $nilai
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
    		'siswa_id' => 'required',
    		'mapel_id' => 'required',
            'uas' => 'required',
            'uts' => 'required',
            'uh1' => 'required',
            'uh2' => 'required',
            'uh3' => 'required',
            'uh4' => 'required',
            'semester' => 'required',
        ]);

        $nilai = Nilai::find($id);
        $nilai->siswa_id = $request->siswa_id;
        $nilai->mapel_id = $request->mapel_id;
        $nilai->uas = $request->uas;
        $nilai->uts = $request->uts;
        $nilai->uh1 = $request->uh1;
        $nilai->uh2 = $request->uh2;
        $nilai->uh3 = $request->uh3;
        $nilai->uh4 = $request->uh4;
        $nilai->semester = $request->semester;
        $nilai->save();

        return redirect()->route('nilais.index')
            ->with('toast_success', 'Berhasil mengubah nilai');
    }

    public function destroy(Request $request, $id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();

        return redirect()->route('nilais.index')
            ->with('toast_success', 'Berhasil menghapus nilai');
    }

    public function cetak_pdf()
    {
        $nilai = Nilai::all();
 
        $pdf = PDF::loadview('nilais/pdf',['nilai'=>$nilai])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-nilai-pdf.pdf');
    }

    public function detail($id)
    {
        $nilai = Nilai::findorfail($id);
        return view('nilais.detail',compact('nilai'));
    }

    public function create_tunggal($id){
      
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
     
        $data = [
          'create_tunggal' => Nilai::where('id', $id)->firstOrFail(),
          'siswa' => Siswa::firstOrFail(),
          'mapel' => Mapel::firstOrFail(),
        ];

        $pdf = PDF::loadView('nilais.laporan_tunggal', $data);
        return $pdf->download('Detail_Data_Nilai_Siswa.pdf', compact($data));
    }
}
