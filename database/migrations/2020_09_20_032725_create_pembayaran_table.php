<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekam_medis_id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id');
            $table->string('tipe_pembayaran');
            $table->integer('diskon_persen')->nullable();
            $table->integer('diskon_rupiah')->nullable();
            $table->integer('total_biaya');
            $table->timestamps();
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onDelete('cascade');
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
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('pembayaran_rekam_medis_id_foreign');
            $table->dropForeign('pembayaran_pasien_id_foreign');
            $table->dropForeign('pembayaran_dokter_id_foreign');
        });

        Schema::dropIfExists('pembayaran');
    }
}
