<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Rupiah;
use DB;
use Session;
use Spatie\Permission\Models\Role;
use Carbon\carbon;

class AdminController extends Controller
{
    // Halaman admin
    public function adm()
    {
      $adm = User::where('auth','Admin')->get();
      return view('modul_admin.pengguna.admin', compact('adm'));
    }

    public function pengaturan()
    {
      return view('modul_admin.setting.index');
    }

    // Profile
    public function profile()
    {
      $profile = User::where('id',Auth::id())->first();
      return view('modul_admin.setting.profile', compact('profile'));
    }

    public function set_theme(Request $request)
    {
      $id = Auth::id();
      $user = User::all();
  
      $set_theme = User::findOrFail($id);
      if ($request->theme == NULL) {
        $set_theme->theme = '0';
      } else {
        $set_theme->theme = $request->theme;
      }
  
      $set_theme->save();
  
      Session::flash('success','Setting Berhasil Disimpan !');
      return back();
    }

    // Proses edit profile
    public function edit_profile(Request $request, $id)
    {
      $foto = $request->file('foto');
      if ($foto) {
        $nama_foto = time()."_".$foto->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/foto_profile';
        $foto->storeAs($tujuan_upload,$nama_foto);
      }

      if ($request->password) {
        $password = Hash::make($request->password);
      }
      $profile = User::findOrFail($id);
      $profile->name            = $request->name;
      $profile->email           = $request->email;
      $profile->jk              = $request->jk;
      $profile->no_telp         = $request->number;
      $profile->alamat          = $request->alamat;
      $profile->nama_cabang     = $request->nama_cabang;
      $profile->alamat_cabang   = $request->alamat_cabang;
      $profile->foto            = $nama_foto ?? Auth::user()->foto;
      $profile->password        = $password ?? Auth::user()->password;
      $profile->save();

      Session::flash('success','Data profile berhasil diupdate !');
      return back();
    }
}
