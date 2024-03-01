<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, riwayat_ck, riwayat_dc, riwayat_cs, order_cs, order_ck, order_dc};

class CustomerController extends Controller
{

    public function reset(Request $request) {
        $data = [
            'email' => $request->email,
        ];

        if (Auth::attempt($data)) {
            return view('auth.passwords.createp');
        } else {
            return back()->with('error', 'Email tidak terdaftar sebelumnya!');
        }
    }

    public function ck() {
        $ck = riwayat_ck::where('nama_pel', Auth::user()->name)->get();
        return view('customer.riwayat.ck', compact('ck'));   
    }

    public function dc() {
        $dc = riwayat_dc::where('nama_pel', Auth::user()->name)->get();
        return view('customer.riwayat.dc', compact('dc'));   
    }

    public function cs() {
        $cs = riwayat_cs::where('nama_pel', Auth::user()->name)->get();
        return view('customer.riwayat.cs', compact('cs'));   
    }

    public function detailck($id) {
        $ck = order_ck::find($id);
        return view('customer.detail.ck', compact('ck'));
    }

    public function detaildc($id) {
        $dc = order_dc::find($id);
        return view('customer.detail.dc', compact('dc'));
    }
    public function detailcs($id) {
        $cs = order_cs::find($id);
        return view('customer.detail.cs', compact('cs'));
    }
}
