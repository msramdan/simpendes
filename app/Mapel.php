<?php

namespace App;

use App\Karyawan;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'nama_mapel',
        'karyawan_id'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function silabus()
    {
        return $this->hasMany(Silabus::class);
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
