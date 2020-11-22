<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('users_id');
            $table->string('nama_terapis');
            $table->string('anamnesa');
            $table->string('pemeriksaan');
            $table->string('diagnosa');
            $table->timestamps();
        });

        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->dropForeign('rekam_medis_pasien_id_foreign');
            $table->dropForeign('rekam_medis_users_id_foreign');
        });

        Schema::dropIfExists('rekam_medis');
    }
}
