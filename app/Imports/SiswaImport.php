<?php

namespace App\Imports;

use App\Siswa;
use App\Tahun;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //digunakan untuk menandai excel dengan header
use App\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nipd' => $row['nipd'],
            'kelas_id' => $_POST['kelas_id'],
            'tahun_id' => $_POST['tahun_id'],
            'nisn' => $row['nisn'],
            'nik' => $row['nik'],
            'nama_siswa' => $row['nama_siswa'],
            'alamat' => $row['alamat'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'no_telp'=> $row['no_telpon'],
            'nama_ortu'=> $row['nama_orang_tua'],
            'pekerjaan_ortu'=> $row['pekerjaan_orang_tua'],
        ]);
    }
}
