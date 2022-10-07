<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPerkembanganSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_perkembangan_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelatih_id');
            $table->unsignedBigInteger('siswa_id');
            $table->date('tanggal_latihan');
            $table->string('lokasi');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('pelatih_id')->references('id')->on('data_pelatih')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('data_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_perkembangan_siswa');
    }
}
