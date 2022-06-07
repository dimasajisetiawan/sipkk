<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index',[
            'transaksi' =>transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->get()->unique('bulan_tahun')
        ]);
    }

    public function detail_laporan($bulan, $tahun)
    {
        return view('laporan.detail',[
            'transaksi' => transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$bulan)->whereYear('tgl_transaksi',$tahun)->get(),
            'debit' => transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$bulan)->whereYear('tgl_transaksi',$tahun)->where('jenis_saldo','debit')->sum('saldo'),
            'kredit' => transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->whereMonth('tgl_transaksi',$bulan)->whereYear('tgl_transaksi',$tahun)->where('jenis_saldo','kredit')->sum('saldo'),
        ]);
    }
}
