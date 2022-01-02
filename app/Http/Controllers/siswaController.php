<?php

namespace App\Http\Controllers;

use File;
use PDF;
use DataTables;
use Illuminate\Http\Request;
use App\Siswa;
use App\Tahun;
use App\Kelas;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{
    public function index()
    {
        $tahuns = Tahun::all();
        $kelass = Kelas::all();
        $data = Siswa::all();
        return view('Siswa.index', [
            'tahuns' => $tahuns,
            'kelass' => $kelass,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('Siswa.tambahdatasiswa', [
            'kelas' => $kelas,
            'tahun' => $tahun
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nipd' => 'required',
            'tahun_id' => 'required',
            'kelas_id' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_telp'=> 'required',
            'nama_ortu'=> 'required',
            'pekerjaan_ortu'=> 'required',
        ]);

        Siswa::create([
            'nipd' => $request->nipd,
            'tahun_id' => $request->tahun_id,
            'kelas_id' => $request->kelas_id,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_siswa' => $request->nama_siswa,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ortu,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
        ]);

        return redirect('siswa')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function show()
    {
        $tahuns = Tahun::all();
        $kelass = Kelas::all();
        $data = Siswa::all();
        return view('Siswa.show', [
            'tahuns' => $tahuns,
            'kelass' => $kelass,
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        $data = Siswa::findorfail($id);
        return view('Siswa.editdatasiswa', [
            'tahun' => $tahun,
            'kelas' => $kelas,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $ubah = Siswa::findorfail($id);
        // $awal = $ubah->foto;

        $data = [
            'nipd' => $request['nipd'],
            'kelas_id' => $request['kelas_id'],
            'tahun_id' => $request['tahun_id'],
            'nisn' => $request['nisn'],
            'nik' => $request['nik'],
            'nama_siswa' => $request['nama_siswa'],
            'alamat' => $request['alamat'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'agama' => $request['agama'],
            'no_telp' => $request['no_telp'],
            'nama_ortu' => $request['nama_ortu'],
            'pekerjaan_ortu' => $request['pekerjaan_ortu'],
        ];

        // $request->foto->move(public_path().'/foto/profil_siswa', $awal);
        $ubah->update($data);

        return redirect('siswa')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Siswa::findorfail($id);
        $data->delete();

        return back()->with('toast_error', 'Data berhasil dihapus!');
    }

    public function siswaexport(){
        return Excel::download(new SiswaExport,'Data Siswa.xlsx');
    }

    // public function siswaimportexcel(Request $request){
    //     $file = $request->file('file');
    //     $namaFile = $file->getClientOriginalName();
    //     $file->move('DataSiswa', $namaFile);

    //     Excel::import(new SiswaImport, public_path('/DataSiswa/'.$namaFile));
    //     return redirect('siswa');
    // }

    public function siswaimportexcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');


        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new SiswaImport(), storage_path('app/public/excel/'.$nama_file));
        // dd($import);

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect('siswa');
        } else {
            //redirect
            return redirect('siswa');
        }
    }

    public function cetak_pdf()
    {
        $siswa = Siswa::all();

        $pdf = PDF::loadview('siswa/pdf',['siswa'=>$siswa])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-siswa-pdf.pdf');
    }

    public function detail($id)
    {
        $data = Siswa::findorfail($id);
        return view('siswa.detail',compact('data'));
    }

    public function create_tunggal($id){

        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $data = [
          'create_tunggal' => Siswa::where('nipd', $id)->firstOrFail(),
          'tahun' => Tahun::firstOrFail(),
          'kelas' => Kelas::firstOrFail(),
        ];

        $pdf = PDF::loadView('siswa.laporan_tunggal', $data);
        return $pdf->download('Detail_Siswa.pdf', compact($data));
    }
}
