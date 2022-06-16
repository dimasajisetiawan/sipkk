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
        Schema::create('level_dua', function (Blueprint $table) {
            $table->id('id_level_dua');
            $table->char('kode_akun',7);
            $table->string('nama_akun',100);
            $table->unsignedBigInteger('id_level_satu');
            $table->timestamps();
            $table->foreign('id_level_satu')->references('id_level_satu')->on('level_satu')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_dua');
    }
};
