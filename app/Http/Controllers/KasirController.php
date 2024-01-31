<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\log;
use App\Models\transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function konfirbayar(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('status','pesanan di proses')->get();
        $detailtransaksi = $detailtransaksi->groupBy('no_meja');
        return view('kasir.konfirbayar',compact('detailtransaksi'));
    }

    public function tampildetailpesan($no_meja)
    {
        $detailtransaksi = detailtransaksi::where('no_meja', $no_meja)->where('status','pesanan di proses')->get();
        $totalharga = $detailtransaksi->sum(function ($detailtransaksi){
            return $detailtransaksi->totalharga;
        });
        return view('kasir.prosesbayar', compact('detailtransaksi','totalharga'));
    }

    
    public function prosesbayar(Request $request)
    {
        //ambill data dari form input
        $no_meja = $request->input('no_meja');
        $nama_pelanggan = $request->input('nama_pelanggan');
        $totalharga = $request->input('totalharga');
        $uang_bayar = $request->input('uang_bayar');
        
        //buat transaksi baru
        $transaksi = new transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->kode = 'INV'.Str::random(8);
        $transaksi->no_meja = $no_meja;
        $transaksi->nama_pelanggan = $nama_pelanggan;
        $transaksi->totalharga = $totalharga;
        $transaksi->uang_bayar = $uang_bayar;
        $transaksi->uang_kembali = $uang_bayar - $totalharga;
        $transaksi->save();
       
        //ubah status
        detailtransaksi::where('no_meja', $no_meja)
                    ->whereNull('transaksi_id')
                    ->update(['status' => 'selesai', 'transaksi_id' => $transaksi->id]);

        return redirect()->route('summary')->with('status','Berhasil transaksi');
        
    }

    public function summary(detailtransaksi $detailtransaksi)
    {
        $detailtransaksi = detailtransaksi::where('status','selesai')->get();
        $detailtransaksi = $detailtransaksi->groupBy('transaksi_id');
        return view('kasir.summary',compact('detailtransaksi'));
    }

    public function tampildetailsummary($transaksi_id)
    {
        $detailtransaksi = detailtransaksi::where('transaksi_id', $transaksi_id)->where('status','selesai')->get();
        $transaksi = transaksi::find($transaksi_id);
        $totalharga = $detailtransaksi->sum(function ($detailtransaksi){
            return $detailtransaksi->totalharga;
        });
        return view('kasir.detailsummary', compact('detailtransaksi','totalharga', 'transaksi'));
    }


}
