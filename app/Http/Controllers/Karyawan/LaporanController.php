<?php

namespace App\Http\Controllers\Karyawan;

use App\Exports\LaporanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{transaksi,customer,harga, riwayat_ck};
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    //Halaman Laporan
    public function laporan()
    {
      return view('karyawan.laporan.welcome');
    }

    // Export Excel
    public function exportExcel()
    {
      return Excel::download(new LaporanExport, 'laporan_laundry.xlsx');
    }
}
