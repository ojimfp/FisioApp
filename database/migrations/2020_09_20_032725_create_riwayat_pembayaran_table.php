<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekam_medis_id');
            $table->unsignedBigInteger('pasien_id');
            $table->string('tipe_pembayaran')->nullable();
            $table->integer('total_biaya')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::table('riwayat_pembayaran', function (Blueprint $table) {
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_pembayaran', function (Blueprint $table) {
            $table->dropForeign('riwayat_pembayaran_rekam_medis_id_foreign');
            $table->dropForeign('riwayat_pembayaran_pasien_id_foreign');
        });

        Schema::dropIfExists('riwayat_pembayaran');
    }
}
