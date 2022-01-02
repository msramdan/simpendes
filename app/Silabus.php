<?php

namespace App;

use App\Tahun;
use App\Mapel;
use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    protected $table = 'silabus';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'tahun_id',
        'mapel_id',
    	'file_silabus'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
