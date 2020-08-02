<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['nama_pasien','nama_dokter',
    'tgl_tindakan','jam_tindakan','status'];
    protected $dates = ['created_at', 'update_at'];
}
