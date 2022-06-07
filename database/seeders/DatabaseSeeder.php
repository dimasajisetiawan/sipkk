<?php

namespace Database\Seeders;

use App\Models\akun;
use App\Models\User;
use App\Models\level_dua;
use App\Models\sumbangan;
use App\Models\transaksi;
use App\Models\level_satu;
use App\Models\level_tiga;
use App\Models\penyumbang;
use Illuminate\Database\Seeder;
use App\Models\daftar_penyumbang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'admin',
            'nama' => 'Dimas Aji Setiawan',
            'email' => 'dimazaji619@gmail.com',
            'role_users' => 'admin',
            'password' => bcrypt('12345'),
            'password_temp' => '12345'
        ]);
        User::create([
            'username' => 'bendahara',
            'nama' => 'Prima Ady Pamungkas',
            'email' => 'primady619@gmail.com',
            'role_users' => 'bendahara',
            'password' => bcrypt('12345'),
            'password_temp' => '12345'
        ]);
        User::create([
            'username' => 'pemantau',
            'nama' => 'Dimas Aji Steven',
            'email' => 'dimazsteven619@gmail.com',
            'role_users' => 'pemantau',
            'password' => bcrypt('12345'),
            'password_temp' => '12345'
        ]);

        level_satu::create([
            'kode_akun' => '1',
            'nama_akun' => 'KAS'
        ]);

        level_dua::create([
            'kode_akun' => '01',
            'nama_akun' => 'KAS LINGKUNGAN',
            'id_level_satu' => '1'
        ]);

        level_tiga::create([
            'kode_akun' => '01',
            'nama_akun' => 'KAS LINGKUNGAN',
            'id_level_dua' => '1'
        ]);
        level_tiga::create([
            'kode_akun' => '02',
            'nama_akun' => 'KAS KECIL BLOK',
            'id_level_dua' => '1'
        ]);
        level_satu::create([
            'kode_akun' => '4',
            'nama_akun' => 'PENERIMAAN'
        ]);
        level_dua::create([
            'kode_akun' => '01',
            'nama_akun' => 'Biaya',
            'id_level_satu' => '2'
        ]);
        level_tiga::create([
            'kode_akun' => '01',
            'nama_akun' => 'KOLEKTE',
            'id_level_dua' => '2'
        ]);
        level_tiga::create([
            'kode_akun' => '02',
            'nama_akun' => 'KOLEKTE PART 2',
            'id_level_dua' => '2'
        ]);
        level_satu::create([
            'kode_akun' => '5',
            'nama_akun' => 'BIAYA'
        ]);
        level_dua::create([
            'kode_akun' => '01',
            'nama_akun' => 'BIAYA LITURGI & PERIBADATAN',
            'id_level_satu' => '3'
        ]);
        sumbangan::create([
            'kode_kegiatan' => 'SBN_69',
            'nama_kegiatan' => 'Sumbangan Gunung Merapi',
            'keterangan' => 'Bantuan Korban Desa Cangkringan',
            'tgl_buka' => '2010-11-10',
            'tgl_tutup' => '2010-11-20'
        ]);
        daftar_penyumbang::create([
            'id_user' => '1',
            'nominal' => '500000',
            'tgl_sumbangan' => '2010-11-10',
            'id_penyumbang' => '1'
        ]);
        daftar_penyumbang::create([
            'id_user' => '2',
            'nominal' => '500000',
            'tgl_sumbangan' => '2010-11-12',
            'id_penyumbang' => '1'
        ]);
        daftar_penyumbang::create([
            'id_user' => '2',
            'nominal' => '500000',
            'tgl_sumbangan' => '2010-11-14',
            'id_penyumbang' => '1'
        ]);
    }
}
