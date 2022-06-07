<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
                CREATE TRIGGER after_sumbangan_insert AFTER INSERT ON `sumbangan` FOR EACH ROW
                    BEGIN
                        INSERT INTO `penyumbang`(`kode_kegiatan`) VALUES (NEW.kode_kegiatan);
                    END
                ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyumbang', function (Blueprint $table) {
            //
        });
    }
};
