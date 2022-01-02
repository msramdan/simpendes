<?php

namespace App;

use App\Tahun;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    protected $table = 'proker';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'tahun_id',
    	'file_proker',
    	'keterangan'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
