<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'riwayat_pembayaran';

    public function rekamMedis()
    {
        return $this->belongsTo('App\RekamMedis');
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien');
    }
}
