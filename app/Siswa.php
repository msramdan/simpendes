<?php

namespace App;

use App\Tahun;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nipd';
    public $incrementing = false;
    protected $fillable = [
    	'nipd',
        'kelas_id',
    	'tahun_id',
    	'nisn',
    	'nik',
    	'nama_siswa',
    	'alamat',
    	'tempat_lahir',
    	'tanggal_lahir',
    	'jenis_kelamin',
    	'agama',
    	'no_telp',
    	'nama_ortu',
    	'pekerjaan_ortu',
        'foto'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
