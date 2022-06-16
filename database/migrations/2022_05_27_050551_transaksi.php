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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_level_satu');
            $table->unsignedBigInteger('id_level_dua')->nullable(true);
            $table->unsignedBigInteger('id_level_tiga')->nullable(true);
            $table->date('tgl_transaksi');
            $table->char('jenis_saldo',6);
            $table->decimal('saldo',17,2);
            $table->text('keterangan');
            $table->char('kode_kegiatan',10)->nullable(true);
            $table->timestamps();
            $table->foreign('kode_kegiatan')->references('kode_kegiatan')->on('sumbangan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_level_satu')->references('id_level_satu')->on('level_satu')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_level_dua')->references('id_level_dua')->on('level_dua')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_level_tiga')->references('id_level_tiga')->on('level_tiga')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
