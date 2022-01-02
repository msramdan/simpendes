<?php

namespace App;

use App\Tahun;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $table = 'sk';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
        'tahun_id',
    	'file_sk',
        'keterangan'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
