<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\sumbangan;
use App\Models\penyumbang;
use Illuminate\Http\Request;
use App\Models\daftar_penyumbang;
use Illuminate\Support\Facades\Redirect;

class PenyumbangController extends Controller
{
    public function index($id)
    {
        return view('penyumbang.index',[
            'penyumbang' => penyumbang::where('id_penyumbang',$id)->get(),
            'id' => $id
        ]);
    }
    public function insert_penyumbang($id, Request $request)
    {
        if($request->isMethod("POST")){
            $validatedData = $request->validate([
                'id_user' => 'required',
                'tgl_sumbangan' => 'required',
                'nominal' => 'required|size:13'
            ]);
            $validatedData['nominal'] = str_replace(',','',$request->nominal);
            $validatedData['id_penyumbang'] = $id;
            if ($validatedData['nominal']>2147483647) {
                return back()->with('error', 'Angka Tidak Boleh > 2,000,000,000 ');
            }
            daftar_penyumbang::create($validatedData);
            return redirect("/daftarpenyumbang/$id")->with('success','Tambah Penyumbang Berhasil!');
        }else{
        return view('penyumbang.insert',[
            'user' => User::get(),
            'id' => $id
        ]);
        }
    }
    public function update_penyumbang(daftar_penyumbang $daftar_penyumbang, $id, Request $request)
    {
        if($request->isMethod("POST")){
            $validatedData = $request->validate([
                'id_user' => 'required',
                'tgl_sumbangan' => 'required',
                'nominal' => 'required'
            ]);
            $validatedData['nominal'] = str_replace(',','',$request->nominal);
            $validatedData['id_penyumbang'] = $id;
            daftar_penyumbang::where('id_daftar_penyumbang',$daftar_penyumbang->id_daftar_penyumbang)->update($validatedData);
            return redirect("/daftarpenyumbang/$id")->with('success','Ubah Penyumbang Berhasil!');
        }else{
        return view('penyumbang.update',[
            'daftar_penyumbang' => $daftar_penyumbang,
            'user' => User::get(),
            'id' => $id
        ]);
        }
    }

    public function delete_penyumbang(daftar_penyumbang $daftar_penyumbang,$id)
    {
        daftar_penyumbang::where(
            'id_daftar_penyumbang',
            $daftar_penyumbang->id_daftar_penyumbang
        )->where('id_penyumbang',$id)->delete();
        return redirect("/daftarpenyumbang/$id")->with('success', 'Delete Penyumbang Berhasil!');
    }
}
