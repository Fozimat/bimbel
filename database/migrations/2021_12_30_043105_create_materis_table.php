<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapel');
            $table->unsignedBigInteger('id_tingkat');
            $table->string('judul');
            $table->string('materi');
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('id_mapel')->references('id')->on('mapel')->onDelete('restrict');
            $table->foreign('id_tingkat')->references('id')->on('tingkat')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
    }
}
