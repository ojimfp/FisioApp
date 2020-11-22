<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    public function pasien()
    {
        return $this->belongsTo('App\Pasien');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function tindakan()
    {
        return $this->belongsToMany('App\Tindakan');
    }

    public function pembayaran()
    {
        return $this->hasOne('App\Pembayaran');
    }
}
