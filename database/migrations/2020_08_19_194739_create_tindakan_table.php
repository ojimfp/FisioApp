<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tindakan');
            $table->string('nama_tindakan');
            $table->integer('harga_jual');
            $table->integer('komisi_tindakan');
            $table->string('kategori_tindakan');
            $table->string('status_member');
            $table->string('status_aktif');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('tindakan');
    }
}
