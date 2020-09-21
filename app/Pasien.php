<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    public function rekamMedis()
    {
        return $this->hasMany('App\RekamMedis');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }
}
