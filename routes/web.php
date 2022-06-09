<?php

use App\Http\Controllers\JsonAkun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SumbanganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenyumbangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[LoginController::class,'index'])->middleware('guest');

Route::controller(LoginController::class)->group(function() {
    Route::get('/','index')->name('login')->middleware('guest');
    Route::post('/','Authenticate');
    Route::post('logout','Logout');
});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/dashboard','index')->middleware('auth');
});
Route::controller(PenggunaController::class)->group(function() {
    Route::get('/daftarpengguna','index')->middleware(['checkRole:admin']);
    Route::match(['get', 'post'], '/tambahpengguna','insert_pengguna')->middleware(['checkRole:admin']);
    Route::match(['get', 'post'], '/ubahpengguna/{user:id_user}','update_pengguna')->middleware(['checkRole:admin']);
    Route::get('/hapuspengguna/{user:id_user}','delete_pengguna')->middleware(['checkRole:admin']);
});

Route::controller(AkunController::class)->group(function() {
    Route::match(['get', 'post'], '/tambahlevelsatu','insert_level_satu')->middleware(['checkRole:admin']);
    Route::match(['get','post'],'/ubahlevelsatu/{level_satu:id_level_satu}','update_level_satu')->middleware(['checkRole:admin']);
    Route::get('/daftarlevelsatu','index_level_satu')->middleware(['checkRole:admin']);
    Route::get('/hapuslevelsatu/{level_satu:id_level_satu}','delete_level_satu')->middleware(['checkRole:admin']);

    Route::get('/daftarleveldua','index_level_dua')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get', 'post'], '/tambahleveldua','insert_level_dua')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get', 'post'], '/ubahleveldua/{level_dua:id_level_dua}','update_level_dua')->middleware(['checkRole:admin,bendahara']);
    Route::get('/hapusleveldua/{level_dua:id_level_dua}','delete_level_dua')->middleware(['checkRole:admin,bendahara']);

    Route::get('/daftarleveltiga','index_level_tiga')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get', 'post'], '/tambahleveltiga','insert_level_tiga')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get', 'post'], '/ubahleveltiga/{level_tiga:id_level_tiga}','update_level_tiga')->middleware(['checkRole:admin,bendahara']);
    Route::get('/hapusleveltiga/{level_tiga:id_level_tiga}','delete_level_tiga')->middleware(['checkRole:admin,bendahara']);
});
Route::controller(SumbanganController::class)->group(function() {
    Route::get('/daftarsumbangan','index')->middleware(['checkRole:admin,bendahara']);
    // Route::get('bukasumbangan','open')->middleware('auth');
    // Route::post('bukasumbangan','post_open')->middleware('auth');
    Route::match(['get','post'],'/bukasumbangan','post_open')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get','post'],'/ubahsumbangan/{sumbangan:kode_kegiatan}','update_open')->middleware(['checkRole:admin,bendahara']);
    Route::get('/hapussumbangan/{sumbangan:kode_kegiatan}','delete_open')->middleware(['checkRole:admin,bendahara']);
    Route::get('detailsumbangan/{sumbangan:kode_kegiatan}','detail')->middleware(['checkRole:admin,bendahara']);
});
Route::controller(PenyumbangController::class)->group(function() {
    Route::get('/daftarpenyumbang/{id}','index')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get','post'],'/tambahpenyumbang/{id}','insert_penyumbang')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get','post'],'/ubahpenyumbang/{daftar_penyumbang:id_daftar_penyumbang}/{id}','update_penyumbang')->middleware(['checkRole:admin,bendahara']);
    Route::get('/hapuspenyumbang/{daftar_penyumbang:id_daftar_penyumbang}/{id}','delete_penyumbang')->middleware(['checkRole:admin,bendahara']);
});
Route::controller(TransaksiController::class)->group(function() {
    Route::get('/daftartransaksi','index')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get','post'],'/tambahtransaksi','insert_transaksi')->middleware(['checkRole:admin,bendahara']);
    Route::match(['get','post'],'/ubahtransaksi/{transaksi:id_transaksi}','update_transaksi')->middleware(['checkRole:admin,bendahara']);
    Route::get('/hapustransaksi/{transaksi:id_transaksi}','delete_transaksi')->middleware(['checkRole:admin,bendahara']);
    Route::get('/posttransaksi/{sumbangan:kode_kegiatan}','post_transaksi')->middleware(['checkRole:admin,bendahara']);
});

Route::controller(LaporanController::class)->group(function() {
    Route::get('/daftarlaporan','index')->middleware('auth');
    Route::get('/detaillaporan/{bulan}/{tahun}','detail_laporan')->middleware('auth');
});

Route::controller(JsonAkun::class)->group(function() {
    Route::get('gen_level_dua/{level_satu:id_level_satu}','gen_level_dua')->name('gen_level_dua')->middleware(['checkRole:admin,bendahara']);
    Route::get('gen_level_tiga/{level_dua:id_level_dua}','gen_level_tiga')->name('gen_level_tiga')->middleware(['checkRole:admin,bendahara']);
    Route::get('sel_level_dua_on_level_tiga/{level_satu:id_level_satu}','sel_level_dua_on_level_tiga')->name('sel_level_dua_on_level_tiga')->middleware(['checkRole:admin,bendahara']);
    Route::get('sel_level_tiga/{level_dua:id_level_dua}','sel_level_tiga')->name('sel_level_tiga')->middleware(['checkRole:admin,bendahara']);

    Route::get('cekperiode','cek_periode')->name('cekperiode');
});

