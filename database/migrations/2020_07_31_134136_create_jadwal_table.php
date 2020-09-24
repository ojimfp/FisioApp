<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->string('umur_pasien');
            $table->unsignedBigInteger('dokter_id');
            $table->string('tgl_tindakan');
            $table->string('jam_tindakan');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign('jadwal_pasien_id_foreign');
            $table->dropForeign('jadwal_dokter_id_foreign');
        });

        Schema::dropIfExists('jadwal');
    }
}
