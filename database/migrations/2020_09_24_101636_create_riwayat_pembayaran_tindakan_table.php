<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembayaranTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pembayaran_tindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('riwayat_pembayaran_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->timestamps();
        });

        Schema::table('riwayat_pembayaran_tindakan', function (Blueprint $table) {
            $table->foreign('riwayat_pembayaran_id')->references('id')->on('riwayat_pembayaran')->onDelete('cascade');
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
        Schema::table('riwayat_pembayaran_tindakan', function (Blueprint $table) {
            $table->dropForeign('riwayat_pembayaran_tindakan_riwayat_pembayaran_id_foreign');
            $table->dropForeign('riwayat_pembayaran_tindakan_tindakan_id_foreign');
        });

        Schema::dropIfExists('riwayat_pembayaran_tindakan');
    }
}
