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
        Schema::create('sumbangan', function (Blueprint $table) {
            $table->char('kode_kegiatan',10)->primary();
            $table->string('nama_kegiatan');
            $table->string('keterangan');
            $table->date('tgl_buka');
            $table->date('tgl_tutup');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('sumbangan');
    }
};