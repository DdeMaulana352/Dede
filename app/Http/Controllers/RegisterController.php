<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register() {
        return view('auth.register');
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
        return redirect('/customers');
    }

    public function karyawan(Request $request) {

        $pesan = [
            'required' => 'Form tidak boleh kosong',
            'email' => 'Isi form harus email!',
            'min' => 'angka sandi minimal 6 karakter',
            'numeric' => 'Hanya boleh menginput angka',
            'digits_between' => 'Nomor telepon harus 11-13 angka'
          ];
    
          $this->validate($request, [
            'name' => 'required',
            'jk' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'no_telp' => 'required|digits_between:11,13|numeric',
            'alamat' => 'required'
          ], $pesan);

        $adduser = New User();
        $adduser->name          = $request->name;
        $adduser->jk            = $request->jk;
        $adduser->email         = $request->email;
        $adduser->alamat        = $request->alamat;
        $adduser->no_telp       = $request->no_telp;
        $adduser->status        = 'Active';
        $adduser->auth          = 'Karyawan';
        $adduser->password      = Hash::make($request->password);
        $adduser->save();

        $adduser->assignRole($adduser->auth);
        return redirect('/karyawan');
    }

    public function signup(Request $request) {

        
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
            'telepon' => 'required|digits_between:11,13|numeric',
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
        return redirect('/login')->with('message', 'Akun berhasil di daftarkan');
    }
}
