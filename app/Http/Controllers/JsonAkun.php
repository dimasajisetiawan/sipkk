<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\level_dua;
use App\Models\transaksi;
use App\Models\level_satu;
use App\Models\level_tiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonAkun extends Controller
{
    public function gen_level_dua(level_satu $level_satu)
    {
            $kode_level_dua = level_dua::select('kode_akun')->where('id_level_satu',$level_satu->id_level_satu)->count();
            $no_urut = $kode_level_dua + 1;
            $dua_digit = str_pad($no_urut,2,'0',STR_PAD_LEFT);
            $kode = $dua_digit;
            $data['kode'] = $kode;


         return response()->json($data);
    }

    public function gen_level_tiga(level_dua $level_dua)
    {
         $kode_level_tiga = level_tiga::select('kode_akun')->where('id_level_dua',$level_dua->id_level_dua)->count();
         $no_urut = $kode_level_tiga + 1;
         $dua_digit = str_pad($no_urut,2,'0',STR_PAD_LEFT);
         $kode = $dua_digit;
         $data['kode'] = $kode;


         return response()->json($data);
    }

    public function sel_level_dua_on_level_tiga(level_satu $level_satu)
    {
         $kode_level_satu = level_dua::where('id_level_satu',$level_satu->id_level_satu)->get();
         $data = $kode_level_satu;


         return response()->json($data);
    }
    public function sel_level_tiga(level_dua $level_dua)
    {
         $kode_level_tiga = level_tiga::where('id_level_dua',$level_dua->id_level_dua)->get();
         $data = $kode_level_tiga;


         return response()->json($data);
    }

    public function cek_periode(Request $request)
    {
        if(!empty($request->bulan) && empty($request->tahun)){
            $data = transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'),DB::raw('MONTH(tgl_transaksi) as bulan'),DB::raw('YEAR(tgl_transaksi) as tahun'))->whereMonth('tgl_transaksi',$request->bulan)->get();
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$request->bulan)->where('jenis_saldo','debit')->sum('saldo');
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$request->bulan)->where('jenis_saldo','kredit')->sum('saldo');
            return response()->json($data);
        }

        elseif(!empty($request->tahun) && empty($request->bulan)){
            $data = transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'),DB::raw('MONTH(tgl_transaksi) as bulan'),DB::raw('YEAR(tgl_transaksi) as tahun'))->whereYear('tgl_transaksi',$request->tahun)->get();
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereYear('tgl_transaksi',$request->tahun)->where('jenis_saldo','debit')->sum('saldo');
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereYear('tgl_transaksi',$request->tahun)->where('jenis_saldo','kredit')->sum('saldo');
            return response()->json($data);
        }
        elseif($request->bulan==0 && $request->tahun==0 ){
            $data = transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'),DB::raw('MONTH(tgl_transaksi) as bulan'),DB::raw('YEAR(tgl_transaksi) as tahun'))->get()->unique('bulan_tahun');
            return $data;
        }
        else{
            $data = transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'),DB::raw('MONTH(tgl_transaksi) as bulan'),DB::raw('YEAR(tgl_transaksi) as tahun'))->whereMonth('tgl_transaksi',$request->bulan)->whereYear('tgl_transaksi',$request->tahun)->get();
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$request->bulan)->whereYear('tgl_transaksi',$request->tahun)->where('jenis_saldo','debit')->sum('saldo');
            // $data += transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$request->bulan)->whereYear('tgl_transaksi',$request->tahun)->where('jenis_saldo','kredit')->sum('saldo');
            return response()->json($data);
        }
    }
}
