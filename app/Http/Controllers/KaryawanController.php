<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanImport;
use App\Karyawan;
use App\Role;
use App\Proker;
use PDF;
use File;
use App\Exports\KaryawanExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function index()
    {
    	$prokers = Proker::all();
    	$roles = Role::all();
        $karyawans = Karyawan::all();
        return view('karyawans.index', [
            'prokers' => $prokers,
            'roles' => $roles,
            'karyawans' => $karyawans
        ]);
    }

    public function karyawanimportexcel(Request $request)
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
        $import = Excel::import(new KaryawanImport(), storage_path('app/public/excel/'.$nama_file));
        // dd($import);

        //remove from server
        Storage::delete($path);

        if($import) {
            return redirect()->route('karyawans.index');
        } else {
            return redirect()->route('karyawans.index');
        }
    }

    public function create()
    {
    	$proker = Proker::orderBy('keterangan', 'ASC')->get();
    	$role = Role::orderBy('role_karyawan', 'ASC')->get();
        return view('karyawans.create', [
            'proker' => $proker,
            'role' => $role
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'proker_id' => 'required',
            'role_id' => 'required',
            'nama_karyawan' => 'required',
            'telp_karyawan' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        Karyawan::create([
            'nip' => $request->nip,
            'proker_id' => $request->proker_id,
            'role_id' => $request->role_id,
            'nama_karyawan' => $request->nama_karyawan,
            'telp_karyawan' => $request->telp_karyawan,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('karyawans.index')
            ->with('toast_success', 'Data berhasil ditambahkan!');

    }

    public function show()
    {
        $prokers = Proker::all();
        $roles = Role::all();
        $karyawans = Karyawan::all();
        return view('karyawans.show', [
            'prokers' => $prokers,
            'roles' => $roles,
            'karyawans' => $karyawans
        ]);
    }

    public function edit($id)
    {
    	$proker = Proker::orderBy('keterangan', 'ASC')->get();
    	$role = Role::orderBy('role_karyawan', 'ASC')->get();
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawans.index')
            ->with('error_message', 'Karyawan dengan id'.$id.' tidak ditemukan');

        return view('karyawans.edit', [
        	'proker' => $proker,
        	'role' => $role,
            'karyawan' => $karyawan
        ]);
    }


    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findorfail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawans.index')
            ->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('karyawans.index')
            ->with('toast_success', 'Data berhasil dihapus!');
    }

    public function cetak_pdf()
    {
        $karyawan = Karyawan::all();

        $pdf = PDF::loadview('karyawans/pdf',['karyawan'=>$karyawan])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-karyawan-pdf.pdf');
    }

    public function detail($id)
    {
        $karyawan = Karyawan::findorfail($id);
        return view('karyawans.detail',compact('karyawan'));
    }

    public function download($id)
    {
        $prokers = Proker::all();
        $karyawans = Karyawan::where('nip', $id)->firstOrFail();
        return response()->download(storage_path("app/public/arsip/proker/{$karyawan->proker->file_proker}"));
    }

    public function karyawanexport(){
        return Excel::download(new KaryawanExport,'Data Karyawan.xlsx');
    }
}
