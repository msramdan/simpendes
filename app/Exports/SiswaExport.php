<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class SiswaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    public function view(): View
    {
        return view('siswa.show', [
            'siswa' => Siswa::orderBy('nipd','ASC')->get()
        ]);
    }
}
