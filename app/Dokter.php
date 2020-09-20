<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    public function rekamMedis()
    {
        return $this->hasMany('App\Dokter');
    }
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
}
