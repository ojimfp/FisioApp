<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis_tindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekam_medis_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->timestamps();
        });

        Schema::table('rekam_medis_tindakan', function (Blueprint $table) {
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onDelete('cascade');
            $table->foreign('tindakan_id')->references('id')->on('tindakan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekam_medis_tindakan', function (Blueprint $table) {
            $table->dropForeign('rekam_medis_tindakan_rekam_medis_id_foreign');
            $table->dropForeign('rekam_medis_tindakan_tindakan_id_foreign');
        });

        Schema::dropIfExists('rekam_medis_tindakan');
    }
}
