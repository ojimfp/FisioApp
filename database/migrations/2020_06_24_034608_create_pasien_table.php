<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kota');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->string('email')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('masalah_kulit')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
