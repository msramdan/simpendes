<?php

namespace App;

use App\Siswa;
use App\Mapel;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'siswa_id',
    	'mapel_id',
    	'uas',
        'uts',
        'uh1',
        'uh2',
        'uh3',
        'uh4',
    	'semester'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
