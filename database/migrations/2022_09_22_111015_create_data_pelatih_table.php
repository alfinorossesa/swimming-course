<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelatihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pelatih', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('no_telp', 13);
            $table->text('alamat');
            $table->string('foto');
            $table->string('username')->unique();
            $table->string('password', 100);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('data_pelatih');
    }
}
