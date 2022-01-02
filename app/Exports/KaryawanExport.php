<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class KaryawanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    public function view(): View
    {
        return view('karyawans.show', [
            'karyawans' => Karyawan::orderBy('nama_karyawan','ASC')->get()
        ]);
    }
}
