<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokter_id');
            $table->string('bulan');
            $table->integer('hari_kerja');
            $table->integer('hari_masuk');
            $table->integer('gaji_bersih');
            $table->integer('uang_koor')->nullable();
            $table->integer('ins_tindakan')->nullable();
            $table->integer('ins_exe')->nullable();
            $table->integer('ins_minggu')->nullable();
            $table->integer('bonus')->nullable();
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
        Schema::dropIfExists('gaji');
    }
}
