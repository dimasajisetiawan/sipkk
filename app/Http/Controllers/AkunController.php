<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\level_dua;
use App\Models\level_satu;
use App\Models\level_tiga;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index_level_satu()
    {
        return view('akun.level_satu.index', [
            'akn' => level_satu::get(),
        ]);
    }

    public function insert_level_satu(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_satu::create($validatedData);
            return redirect('/daftarlevelsatu')->with(
                'success',
                'Tambah Akun Berhasil!'
            );
        } else {
            return view('akun.level_satu.insert');
        }
    }
    public function update_level_satu(level_satu $level_satu, Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_satu::where(
                'id_level_satu',
                $level_satu->id_level_satu
            )->update($validatedData);
            return redirect('/daftarlevelsatu')->with(
                'success',
                'Ubah Akun Berhasil!'
            );
        } else {
            return view('akun.level_satu.update', [
                'level_satu' => $level_satu,
            ]);
        }
    }
    public function delete_level_satu(level_satu $level_satu)
    {
        level_satu::where(
            'id_level_satu',
            $level_satu->id_level_satu
        )->delete();
        return redirect('/daftarlevelsatu')->with('success', 'Delete Akun Berhasil!');
    }

    public function index_level_dua()
    {
        return view('akun.level_dua.index', [
            'akn' => level_satu::get(),
        ]);
    }
    public function insert_level_dua(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'id_level_satu' => 'required',
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_dua::create($validatedData);
            return redirect('/daftarleveldua')->with(
                'success',
                'Tambah Akun Berhasil!'
            );
        } else {
            return view('akun.level_dua.insert', [
                'st' => level_satu::get(),
            ]);
        }
    }
    public function update_level_dua(level_dua $level_dua, Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'id_level_satu' => 'required',
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_dua::where(
                'id_level_dua',
                $level_dua->id_level_dua
            )->update($validatedData);
            return redirect('/daftarleveldua')->with(
                'success',
                'Ubah Akun Berhasil!'
            );
        } else {
            return view('akun.level_dua.update', [
                'level_dua' => $level_dua,
                'st' => level_satu::get()
            ]);
        }
    }

    public function delete_level_dua(level_dua $level_dua)
    {
        level_dua::where(
            'id_level_dua',
            $level_dua->id_level_dua
        )->delete();
        return redirect('/daftarleveldua')->with('success', 'Delete Akun Berhasil!');
    }

    public function index_level_tiga()
    {
        return view('akun.level_tiga.index', [
            'akn' => level_satu::get(),
        ]);
    }
    public function insert_level_tiga(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'id_level_dua' => 'required',
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_tiga::create($validatedData);
            return redirect('/daftarleveltiga')->with(
                'success',
                'Tambah Akun Berhasil!'
            );
        } else {
            return view('akun.level_tiga.insert', [
                'st' => level_satu::get(),
            ]);
        }
    }

    public function update_level_tiga(level_tiga $level_tiga, Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'id_level_dua' => 'required',
                'kode_akun' => 'required',
                'nama_akun' => 'required',
            ]);
            level_tiga::where(
                'id_level_tiga',
                $level_tiga->id_level_tiga
            )->update($validatedData);
            return redirect('/daftarleveltiga')->with(
                'success',
                'Ubah Akun Berhasil!'
            );
        } else {
            return view('akun.level_tiga.update', [
                'level_tiga' => $level_tiga,
                'st' => level_satu::get()
            ]);
        }
    }
    public function delete_level_tiga(level_tiga $level_tiga)
    {
        level_tiga::where(
            'id_level_tiga',
            $level_tiga->id_level_tiga
        )->delete();
        return redirect('/daftarleveltiga')->with('success', 'Delete Akun Berhasil!');
    }
    // public function post_level_tiga(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'kode_akun' => 'required',
    //         'nama_reff' => 'required'
    //     ]);
    //     akun::create($validatedData);
    //     return redirect('/dashboard')->with('success','Tambah Akun Berhasil!');
    // }
}
