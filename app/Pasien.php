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
}
