<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    public function dokter()
    {
        return $this->belongsTo('App\Dokter');
    }
}
