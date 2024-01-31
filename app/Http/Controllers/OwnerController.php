<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\log;
use App\Models\menu;
use App\Models\transaksi;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    
    public function printtransaksi(detailtransaksi $detailtransaksi, menu $menu)
    {
        $transaksi = transaksi::all();
        return view('owner.printtransaksi', compact('detailtransaksi','transaksi','menu'));
    }

    public function filtering(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $transaksi=transaksi::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();
        
        return view('owner.printtransaksi',compact('transaksi'));
    }
}
