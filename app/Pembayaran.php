<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    public function rekam_medis()
    {
        return $this->belongsTo('App\RekamMedis');
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien');
    }

    public function tindakan()
    {
        return $this->belongsToMany('App\Tindakan');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }
}
