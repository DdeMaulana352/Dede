<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\orderck;
use App\Models\ordercs;
use App\Models\orderdc;
use App\Models\input_dc;
use App\Models\input_cs;
use App\Models\input_ck;

class OrderController extends Controller
{
    public function dry() {
        return view('karyawan.order.dc');
    }

    public function satuan() {
        return view('karyawan.order.cs');
    }

    public function komplit() {
        return view('karyawan.order.ck');
    }

    public function orderck(Request $request) {
        $order = input_ck::create([
            'nama_pel' => $request->nama,
            'layanan' => $request->layanan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/home')->with('message', 'Data berhasil dikirim');
    }

    public function orderdc(Request $request) {
        $order = input_dc::create([
            'nama_pel' => $request->nama,
            'layanan' => $request->layanan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/home')->with('message', 'Data berhasil dikirim');
    }

    public function ordercs(Request $request) {
        $order = input_cs::create([
            'nama_pel' => $request->nama,
            'pakaian' => $request->pakaian,
            'layanan' => $request->layanan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/home')->with('message', 'Data berhasil dikirim');
    }
}
