<?php

namespace App\Imports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //digunakan untuk menandai excel dengan header

class KaryawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Karyawan([
            'nip' => $row['nip'],
            'role_id' => $row['role_id'],
            'proker_id' => $row['proker_id'],
            'nama_karyawan' => $row['nama_karyawan'],
            'telp_karyawan' => $row['telp_karyawan'],
            'email' => $row['email'],
            'status' => $row['status'],
        ]);
    }
}
