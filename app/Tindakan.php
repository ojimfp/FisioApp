<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';

    public function rekamMedis()
    {
        return $this->belongsToMany('App\RekamMedis');
    }
}
