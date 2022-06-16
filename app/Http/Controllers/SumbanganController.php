<?php

namespace App\Http\Controllers;

use App\Models\sumbangan;
use App\Models\transaksi;
use App\Models\level_satu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SumbanganController extends Controller
{
    public function index()
    {
        return view('sumbangan.index',[
            'sbn' => sumbangan::get(),
            'st' => level_satu::get(),
        ]);
    //     $sbn = sumbangan::where('kode_kegiatan','SBN_69')->get();
    //     foreach ($sbn as $sumbangan) {
    //         foreach ($sumbangan->penyumbang as $dp) {
    //             return $sumbangan->penyumbang->daftar_penyumbang->unique('id_user')->count();
    //         }
    //     }
    }
    public function post_open(Request $request)
    {
        if($request->isMethod("POST")){
        $validatedData = $request->validate([
            'tgl_buka' => 'required',
            'tgl_tutup' => 'required',
            'kode_kegiatan' => 'required|unique:sumbangan,kode_kegiatan',
            'nama_kegiatan' => 'required',
            'keterangan' => 'required'
        ]);
        if($request ->tgl_tutup < $request->tgl_buka &&  $request->tgl_buka > $request ->tgl_tutup){
            return redirect('/bukasumbangan');
        }else{
            sumbangan::create($validatedData);
        return redirect('/daftarsumbangan')->with('success','Tambah Sumbangan Berhasil!');
        }
       
        }else{
            return view('sumbangan.open');
        }
    }
   public function update_open(sumbangan $sumbangan,Request $request)
   {
    if($request->isMethod("POST")){
        $validatedData = $request->validate([
            'tgl_buka' => 'required',
            'tgl_tutup' => 'required',
            'kode_kegiatan' => ['required',Rule::unique('sumbangan','kode_kegiatan')->ignore($sumbangan)],
            'nama_kegiatan' => 'required',
            'keterangan' => 'required'
        ]);
        if($request ->tgl_tutup < $request->tgl_buka &&  $request->tgl_buka > $request ->tgl_tutup){
            return redirect('/bukasumbangan');
        }else{
            sumbangan::where('kode_kegiatan',$sumbangan->kode_kegiatan)->update($validatedData);
            return redirect('/daftarsumbangan')->with('success','Ubah Sumbangan Berhasil!');
        }
       
        }else{
            return view('sumbangan.update',[
                'sumbangan' => $sumbangan
            ]);
        }
   }
   public function delete_open(sumbangan $sumbangan)
   {
       sumbangan::where('kode_kegiatan',$sumbangan->kode_kegiatan)->delete();
       return redirect('/daftarsumbangan')->with('success','Delete Sumbangan Berhasil!');
   }
}
