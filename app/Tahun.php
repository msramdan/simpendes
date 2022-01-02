<?php

namespace App;

use App\Tahun;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
	protected $table = "tahun_ajaran";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id',
    	'tahun'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function proker()
    {
        return $this->hasMany(Proker::class);
    }
    public function silabus()
    {
        return $this->hasMany(Silabus::class);
    }
    public function sk()
    {
        return $this->hasMany(Sk::class);
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
