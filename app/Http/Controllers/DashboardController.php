<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\User;
use App\Models\transaksi;
use App\Models\level_satu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('index',[
            'akn' => level_satu::get(),
            'usr'=>User::get(),
            'transaksi' =>transaksi::select('*',DB::raw('date_format(tgl_transaksi, "%M %Y") as bulan_tahun'))->get()->unique('bulan_tahun')
        ]);

        // $test = level_satu::get();

        // foreach ($test as $ts ) {
        //     foreach ($ts->level_dua as $lvdua ) {
        //         foreach ($lvdua->level_tiga as $lvtiga) {
        //             return $tampungan =$lvtiga;
        //         }
        //     }
        // }

        // return
    }
}
