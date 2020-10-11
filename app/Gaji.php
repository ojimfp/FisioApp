<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    public function dokter()
    {
        return $this->belongsTo('App\Dokter');
    }
}
