<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\{riwayat_ck, riwayat_dc, riwayat_cs, order_cs, order_ck, order_dc};


class CustomerController extends Controller
{

    public function index()
    {
      $customer = User::where('auth','Customer')->get();
      return view('modul_admin.customer.index', compact('customer'));
    }

    public function edit($id)
    {
      $customer = User::with('transaksiCustomer')->where('id',$id)->first();
      return view('modul_admin.customer.infoCustomer', compact('customer'));
    }

    public function riwayatck($id) {
      $ck = riwayat_ck::where('nama_pel', Auth::user()->name)->get();
      return view('modul_admin.pengguna.ck', compact('ck'));
    }

    public function create() {
      return view('modul_admin.customer.create');
    }

    public function store(Request $request) {

      $pesan = [
        'required' => 'Form tidak boleh kosong',
        'email' => 'Isi form harus email!',
        'min' => 'angka sandi minimal 6 karakter',
        'numeric' => 'Hanya boleh menginput angka',
        'digits_between' => 'Nomor telepon harus 11-13 angka'
      ];

      $this->validate($request, [
        'username' => 'required',
        'jk' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'telepon' => 'required|numeric|digits_between:11,13',
        'alamat' => 'required'
      ], $pesan);

      $new = new User();
      $new->name = $request->username;
      $new->jk = $request->jk;
      $new->email = $request->email;
      $new->password = Hash::make($request->password);
      $new->no_telp = $request->telepon;
      $new->alamat = $request->alamat;
      $new->auth = $request->auth;
      $new->save();

      $new->assignRole($new->auth);
      return redirect('/customer');
  }

    public function hapus($id) {
      $customer = User::find($id);
      $customer->delete();

      return redirect('/customer');
    }

    public function tck() {
      $ck = order_ck::all();
      return view('modul_admin.transaksi.ck', compact('ck'));
    }

    public function tdc() {
      $dc = order_dc::all();
      return view('modul_admin.transaksi.dc', compact('dc'));
    }

    public function tcs() {
      $cs = order_cs::all();
      return view('modul_admin.transaksi.cs', compact('cs'));
    }

    public function detailck($id) {
      $ck = order_ck::find($id);
      return view('modul_admin.transaksi.detailck', compact('ck'));
    }

    public function detaildc($id) {
      $dc = order_dc::find($id);
      return view('modul_admin.transaksi.detaildc', compact('dc'));
    }

    public function detailcs($id) {
      $cs = order_cs::find($id);
      return view('modul_admin.transaksi.detailcs', compact('cs'));
    }

    public function riwayat() {
      return view('modul_admin.transaksi.riwayat');
    }

    public function riwayat_ck() {
        $ck = riwayat_ck::all();
        return view('modul_admin.pengguna.riwayatck', compact('ck'));
    }

    public function riwayat_cs() {
      $cs = riwayat_cs::all();
      return view('modul_admin.pengguna.riwayatcs', compact('cs'));
    }

    public function riwayat_dc() {
      $dc = riwayat_dc::all();
      return view('modul_admin.pengguna.riwayatdc', compact('dc'));
    }
}
