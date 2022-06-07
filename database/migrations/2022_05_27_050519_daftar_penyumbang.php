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
        Schema::create('daftar_penyumbang', function (Blueprint $table) {
            $table->id('id_daftar_penyumbang');
            $table->unsignedBigInteger('id_user');
            $table->integer('nominal');
            $table->date('tgl_sumbangan');
            $table->unsignedBigInteger('id_penyumbang');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_penyumbang')->references('id_penyumbang')->on('penyumbang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_penyumbang');
    }
};
