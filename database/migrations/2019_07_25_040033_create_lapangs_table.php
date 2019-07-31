<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLapangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangs', function (Blueprint $table) {
            $table->Increments('id_lapang');
            $table->string('nama_lapang',20);
            $table->integer('jenis_lapang');
            $table->integer('harga_lapang');
            $table->string('gambar_lapang',225);
            $table->string('folder_lapang',225);
            $table->integer('status_lapang');
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
        Schema::dropIfExists('lapangs');
    }
}
