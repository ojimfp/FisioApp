<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    public function pasien()
    {
        return $this->belongsTo('App\Pasien');
    }

    // public function dokter()
    // {
    //     return $this->belongsTo('App\Dokter');
    // }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
