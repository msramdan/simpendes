<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Siswa;
use App\Karyawan;
use App\User;
use App\Kelas;
use App\Mapel;
use App\Proker;
use App\Silabus;
use App\Sk;

class BerandaController extends Controller
{
    public function index()
    {
        $nama = "Steven Jaksen";
        $user = Auth::user();
        $jumlah_sk = Sk::all()->count();
        $jumlah_silabus = Silabus::all()->count();
        $jumlah_proker = Proker::all()->count();
        $jumlah_mapel = Mapel::all()->count();
        $jumlah_kelas = Kelas::all()->count();
        $jumlah_user = User::all()->count();
        $jumlah_karyawan = Karyawan::all()->count();
        $jumlah_siswa = Siswa::all()->count();
        return view('Admin.beranda', compact('user'))->with('jumlah_siswa', $jumlah_siswa)->with('jumlah_karyawan', $jumlah_karyawan)->with('jumlah_user', $jumlah_user)->with('jumlah_kelas', $jumlah_kelas)->with('jumlah_mapel', $jumlah_mapel)->with('jumlah_proker', $jumlah_proker)->with('jumlah_silabus', $jumlah_silabus)->with('jumlah_sk', $jumlah_sk);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $jumlah_sk = Sk::all()->count();
        $jumlah_silabus = Silabus::all()->count();
        $jumlah_proker = Proker::all()->count();
        $jumlah_mapel = Mapel::all()->count();
        $jumlah_kelas = Kelas::all()->count();
        $jumlah_user = User::all()->count();
        $jumlah_karyawan = Karyawan::all()->count();
        $jumlah_siswa = Siswa::all()->count();
        return view('rekapitulasi', [
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_karyawan' => $jumlah_karyawan,
            'jumlah_user' => $jumlah_user,
            'jumlah_kelas' => $jumlah_kelas,
            'jumlah_mapel' => $jumlah_mapel,
            'jumlah_proker' => $jumlah_proker,
            'jumlah_silabus' => $jumlah_silabus,
            'jumlah_sk' => $jumlah_sk
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
