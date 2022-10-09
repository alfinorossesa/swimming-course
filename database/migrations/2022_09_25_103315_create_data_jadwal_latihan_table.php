<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataJadwalLatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jadwal_latihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelatih_id');
            $table->unsignedBigInteger('siswa_id');
            $table->date('hari');
            $table->time('jam');
            $table->string('lokasi');
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
        Schema::dropIfExists('data_jadwal_latihan');
    }
}
