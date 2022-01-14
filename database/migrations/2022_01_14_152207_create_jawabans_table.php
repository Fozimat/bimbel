<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tugas');
            $table->unsignedBigInteger('id_siswa');
            $table->text('jawaban');
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('id_tugas')->references('id')->on('tugas');
            $table->foreign('id_siswa')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}
