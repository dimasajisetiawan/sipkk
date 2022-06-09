<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\level_satu;
use App\Models\sumbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index',[
            'transaksi' => transaksi::get(),
            'debit' => transaksi::where('jenis_saldo','debit')->sum('saldo'),
            'kredit' => transaksi::where('jenis_saldo','kredit')->sum('saldo'),
        ]);
        // $transaksi = transaksi::get();
        // foreach ($transaksi as $tr) {
        //     return $tr->sumbangan->penyumbang->daftar_penyumbang;
        // }
        // return transaksi::get();
    }
    public function insert_transaksi(Request $request)
    {
        if($request->isMethod('POST')){
            $validatedData = $request->validate([
                'tgl_transaksi' => 'required',
                'id_level_satu' => 'required',
                'id_level_dua' => 'nullable',
                'id_level_tiga' => 'nullable',
                'jenis_saldo' => 'required',
                'saldo' => 'required',
                'keterangan' => 'required'
            ]);
            if($request->kode_kegiatan){
                $validatedData['kode_kegiatan'] = $request->kode_kegiatan;
                $test = [
                    'status' => 1
                ];
                sumbangan::where('kode_kegiatan',$request->kode_kegiatan)->update($test);
            }
            $validatedData['saldo'] = str_replace(',','',$request->saldo);
            transaksi::create($validatedData);
            return redirect('/daftartransaksi')->with('success','Tambah Transaksi Berhasil!');
        }else{
            return view('transaksi.insert',[
                'st' => level_satu::get(),
            ]);
        }
    }
    public function update_transaksi(transaksi $transaksi, Request $request)
    {
        if($request->isMethod('POST')){
            $validatedData = $request->validate([
                'tgl_transaksi' => 'required',
                'id_level_satu' => 'required',
                'id_level_dua' => 'nullable',
                'id_level_tiga' => 'nullable',
                'jenis_saldo' => 'required',
                'saldo' => 'required',
                'keterangan' => 'required'
            ]);
            $validatedData['saldo'] = str_replace(',','',$request->saldo);
            transaksi::where('id_transaksi',$transaksi->id_transaksi)->update($validatedData);
            return redirect('/daftartransaksi')->with('success','Tambah Transaksi Berhasil!');
        }else{
            return view('transaksi.update',[
                'st' => level_satu::get(),
                'transaksi' => $transaksi
            ]);
        }
    }

    public function delete_transaksi(transaksi $transaksi)
    {
        transaksi::where('id_transaksi',$transaksi->id_transaksi)->delete();
        return redirect('/daftartransaksi')->with('success','transaksi berhasil dihapus!');
    }

    public function post_transaksi(sumbangan $sumbangan)
    {
        return view('transaksi.insert',[
            'st' => level_satu::get(),
            'sumbangan' => $sumbangan
        ]);
    }
}
