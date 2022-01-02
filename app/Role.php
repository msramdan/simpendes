<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id',
    	'role_karyawan'
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
