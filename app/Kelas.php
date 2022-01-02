<?php

namespace App;

use App\Tahun;
use App\Karyawan;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'tahun_id',
        'karyawan_id',
    	'nama_kelas'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
