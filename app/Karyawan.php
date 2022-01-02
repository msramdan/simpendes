<?php

namespace App;

use App\Proker;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $fillable = [
    	'nip',
    	'proker_id',
    	'role_id',
    	'nama_karyawan',
    	'telp_karyawan',
    	'email',
    	'status',
        'foto_karyawan'
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'proker_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
