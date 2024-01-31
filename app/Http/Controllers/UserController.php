<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\log;
use App\Models\menu;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        $cek = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::attempt($cek)) {
           $user = Auth::user();
           if ($user->role == 'admin') {
                return redirect()->route('homeadmin')->with('status','selamat datang  '.$user->name);
           }elseif ($user->role == 'user') {
                return redirect()->route('homeuser')->with('status','selamat datang  '.$user->name);
           }elseif ($user->role == 'kasir') {
                return redirect()->route('konfirbayar')->with('status','selamat datang  '.$user->name);
           }elseif ($user->role == 'owner') {
                return redirect()->route('printtransaksi')->with('status','selamat datang  '.$user->name);
           } else {
                return redirect()->route('homeuser');
           }
        }
        return back()->with('status','email atau password salah');
    }

    public function logout()
    {
    
        auth()->logout();
        return redirect()->route('login');
        
    }

    public function homeuser()
    {
        $menu = menu::all();
        return view('homeuser', compact('menu'));
    }

    public function detailpesan(menu $menu)
    {
        return view('user.detailpesan',compact('menu'));
    }

    public function postpesanan(Request $request, menu $menu, transaksi $transaksi)
    {
        $request->validate([
            'banyak'=>'required',
            'catatan'=>'required',
            'no_meja'=>'required',
        ]);

        detailtransaksi::create([
            'user_id'=>Auth::id(),
            'menu_id'=>$menu->id,
            'transaksi_id'=>$transaksi->id,
            'qty'=>$request->banyak,
            'status'=>'masuk keranjang',
            'totalharga'=>$menu->harga*$request->banyak,
            'catatan'=>$request->catatan,
            'no_meja'=>$request->no_meja,
        ]);

        log::create([
            'user_id'=>Auth::id(),
            'activity'=>'user memesan menu'
        ]);
       
        return redirect()->route('keranjang')->with('status','berhasil masuk keranjang');
    }
    public function keranjang(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','masuk keranjang')->get();
        $totalharga = $detailtransaksi->sum(function ($detailtransaksi){
            return $detailtransaksi->totalharga;
        });
        return view('user.keranjang', compact('detailtransaksi','totalharga'));

    }

    public function checkout(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','masuk keranjang')->get();
        
        foreach ($detailtransaksi as $detailtransaksi) {
            $detailtransaksi->update([
                'status'=>'pesanan di proses',
            ]);
        }

        log::create([
            'user_id'=>Auth::id(),
            'activity'=>'user konfirmasi pesanan'
        ]);

        return redirect()->route('riwayat')->with('status','Pesanan terbuat.Mohon tunggu di meja anda.');
    }

    public function riwayat()
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','pesanan di proses')->get();
        return view('user.riwayat', compact('detailtransaksi'));
    }


}
