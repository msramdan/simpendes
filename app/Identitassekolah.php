<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitassekolah extends Model
{
    protected $table = "identitassekolah";
    protected $primaryKey = "id";
    protected $fillable = ['id','npsn','nama_sekolah','nama_kepsek','alamat','kabupaten','kode_pos','logo','no_telp'];
}
