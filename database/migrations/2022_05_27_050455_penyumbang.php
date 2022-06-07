<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyumbang', function (Blueprint $table) {
            $table->id('id_penyumbang');
            $table->char('kode_kegiatan',10);
            $table->timestamps();
            $table->foreign('kode_kegiatan')->references('kode_kegiatan')->on('sumbangan')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyumbang');
    }
};
