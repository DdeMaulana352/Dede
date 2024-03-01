<?php

namespace App\Exports;

use App\Models\{transaksi, riwayat_ck, riwayat_cs, riwayat_dc};
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $data = riwayat_ck::all();
    }
}
