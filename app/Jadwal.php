<?php

namespace App;

use App\Tahun;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'tahun_id',
    	'file_jadwal',
        'keterangan'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
