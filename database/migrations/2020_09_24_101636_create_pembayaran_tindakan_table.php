<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_tindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->timestamps();
        });

        Schema::table('pembayaran_tindakan', function (Blueprint $table) {
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('cascade');
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
        Schema::table('pembayaran_tindakan', function (Blueprint $table) {
            $table->dropForeign('pembayaran_tindakan_pembayaran_id_foreign');
            $table->dropForeign('pembayaran_tindakan_tindakan_id_foreign');
        });

        Schema::dropIfExists('pembayaran_tindakan');
    }
}
