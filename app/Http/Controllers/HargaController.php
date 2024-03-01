<?php

namespace App\Http\Controllers;
use App\Models\paketck;
use App\Models\paketdc;
use App\Models\paketcs;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function cuci_komplit() {
        $paketck = paketck::all();
        return view('customer.harga.paketck', compact('paketck'));
    }

    public function cuci_dry_clean() {
        $paketdc = paketdc::all();
        return view('customer.harga.paketdc', compact('paketdc'));
    }

    public function satuan() {
        $paketcs = paketcs::all();
        return view('customer.harga.paketcs', compact('paketcs'));
    }

    public function order() {
        return view('karyawan.order.welcome');
    }
}
