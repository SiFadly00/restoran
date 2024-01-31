<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\kategori;
use App\Models\log;
use App\Models\menu;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function homeadmin()
    {
        $menu = menu::all();
        return view('admin.homeadmin', compact('menu'));
    }

    public function tambah()
    {
        $kategori = kategori::all();
        return view('admin.tambah', compact('kategori'));
    }

    public function posttambah(Request $request)
    {
        $request->validate([
            'kategori_id'=>'required',
            'name'=>'required',
            'foto'=>'required|file|image',
            'harga'=>'required|numeric'
        ]);

        menu::create([
            'user_id'=>Auth::id(),
            'kategori_id'=>$request->kategori_id,
            'name'=>$request->name,
            'foto'=>$request->foto->store('img'),
            'harga'=>$request->harga
        ]);

        return redirect()->route('homeadmin');
    }

    public function edit(menu $menu)
    {
        $kategori = kategori::all();
        return view('admin.edit', compact('kategori','menu'));
    }

    public function postedit(Request $request, menu $menu)
    {
        $data = $request->validate([
            'kategori_id'=>'required',
            'name'=>'required',
            'foto'=>'file|image',
            'harga'=>'required|numeric'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img');
        } else {
            unset( $data['foto']);
        }
        
        $menu->update($data);
        return redirect()->route('homeadmin');
    }

    public function hapus(menu $menu)
    {
        $menu->delete();
        return redirect()->route('homeadmin');
    }


    public function kelolauser()
    {
        $user = user::all();
        return view('admin.kelolauser', compact('user'));
    }

    public function tampiltambahdatauser()
    {
        return view('admin.tambahdatauser');
    }

    //tambahdatauser
    public function tambahdatauser(Request $request)
    {
        $cek = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role
        ]);

        return redirect()->route('kelolauser');
    }

    public function tampileditdatauser($id)
    {
        $user = user::findOrFail($id);
        return view('admin.editdatauser', compact('user'));
    }

    //tambahdatauser
    public function editdatauser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required', // Pastikan password memenuhi persyaratan keamanan
            'role' => 'required',
        ]);
    
        $user = User::findOrFail($id);
    
        // Periksa apakah password diubah
        if ($request->has('password')) {
            $password = Hash::make($request->password);
        } else {
            // Jika tidak diubah, gunakan password yang ada di database
            $password = $user->password;
        }
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ]);
    
        return redirect()->route('kelolauser')->with('success', 'Data user berhasil diupdate');
    }

    public function hapususer(user $user)
    {
        $user->delete();
        return redirect()->route('kelolauser');
    }

    public function log()
    {
        $log = log::with('user')->get();
        return view('admin.logactivity', compact('log'));
    }


}
