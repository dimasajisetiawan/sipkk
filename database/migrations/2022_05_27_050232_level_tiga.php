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
        Schema::create('level_tiga', function (Blueprint $table) {
            $table->id('id_level_tiga');
            $table->string('kode_akun');
            $table->string('nama_akun');
            $table->unsignedBigInteger('id_level_dua');
            $table->timestamps();
            $table->foreign('id_level_dua')->references('id_level_dua')->on('level_dua')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_tiga');
    }
};
