<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{transaksi,customer,LaundrySetting,User,harga,DataBank, paketck, paketcs, paketdc};
use App\Http\Requests\HargaRequest;
use DB;
use Auth;
use Session;
use Carbon\carbon;

class FinanceController extends Controller
{
  // Finance
  public function index()
  {
    $chartMonthSalary = DB::table('transaksis')
    ->select('bulan', DB::raw('sum(harga_akhir) AS jml'))
    ->whereYear('created_at','=',date("Y", strtotime(now())))
    ->whereMonth('created_at','=',date("m", strtotime(now())))
    ->groupBy('bulan')
    ->get();

    $bulans = '';
    $batas =  12;
    $chartMonth = '';
    for($_i=1; $_i <= $batas; $_i++){
        $bulans = $bulans . (string)$_i . ',';
        $_check = false;
        foreach($chartMonthSalary as $_data){
            if((int)@$_data->bulan === $_i){
                $chartMonth = $chartMonth . (string)$_data->jml . ',';
                $_check = true;
            }
        }
        if(!$_check){
            $chartMonth = $chartMonth . '0,';
        }
    }

    $incomeAll = transaksi::where('status_payment','Success')->sum('harga_akhir');
    $incomeY = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
    ->sum('harga_akhir');

    $incomeM = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
    ->where('bulan', ltrim(date('m'),'0'))->sum('harga_akhir');

    $incomeYOld = transaksi::where('status_payment','Success')->where('tahun',date("Y",strtotime("-1 year")))
    ->sum('harga_akhir');

    $incomeD = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
    ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('harga_akhir');

    $incomeDOld = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
    ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date("d",strtotime("-1 day")),'0'))->sum('harga_akhir');

    $kgDay = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('kg');
    $kgMonth = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->sum('kg');
    $kgYear = transaksi::where('tahun',date('Y'))->sum('kg');

    $getCabang = User::whereHas('transaksi', function($a) {
      $a->where('tahun',date('Y'))
      ->where('bulan', ltrim(date('m'),'0'));
    })
    ->get();

    $target = LaundrySetting::first();

    return view('modul_admin.finance.index', \compact(
      'chartMonth','incomeY','incomeM','incomeYOld','incomeD','incomeDOld',
      'target','incomeAll','getCabang','kgDay','kgMonth','kgYear'
    ));
  }


   // Tambah dan Data Harga
    public function dataharga()
    {
      // Ambil data harga
      $harga = harga::with('harga_user')->orderBy('id','DESC')->get();
      // Cek Apakah sudah ada karyawan atau belum
      $karyawan = User::where('auth','Karyawan')->first();
      // Ambil list cabang
      $getcabang = User::where('auth','Karyawan')->where('status','Active')->get();

      // Get Data Bank
      $getBank = DataBank::where('user_id',Auth::id())->count();

      return view('modul_admin.laundri.harga', compact('harga','karyawan','getcabang','getBank'));
    }

    // Proses Simpan Harga
    public function hargastore(HargaRequest $request)
    {
      $addharga = new harga();
      $addharga->user_id = $request->user_id;
      $addharga->jenis = $request->jenis;
      $addharga->kg = 1000; // satuan gram
      $addharga->harga = preg_replace('/[^A-Za-z0-9\-]/', '', $request->harga); // Remove special caracter
      $addharga->hari = $request->hari;
      $addharga->status = 1; //aktif
      $addharga->save();

      Session::flash('success','Tambah Data Harga Berhasil');
      return redirect('data-harga');
    }

    // Proses edit harga
    public function hargaedit(Request $request)
    {
      $editharga = harga::find($request->id_harga);
      $editharga->update([
          'jenis' => $request->jenis,
          'kg'    => $request->kg,
          'harga' => $request->harga,
          'hari' => $request->hari,
          'status' => $request->status,
      ]);
      Session::flash('success','Edit Data Harga Berhasil');
      return $editharga;

    }

  public function cuci_komplit() {
      $paketck = paketck::all();
      return view('modul_admin.harga.paketck', compact('paketck'));
  }

  public function cuci_dry_clean() {
      $paketdc = paketdc::all();
      return view('modul_admin.harga.paketdc', compact('paketdc'));
  }

  public function satuan() {
      $paketcs = paketcs::all();
      return view('modul_admin.harga.paketcs', compact('paketcs'));
  }

  public function hargack($id) {
      $ck = paketck::find($id);
      return view('modul_admin.harga.ck', compact('ck'));
  }

  public function hargacs($id) {
    $cs = paketcs::find($id);
    return view('modul_admin.harga.cs', compact('cs'));
}

  public function hargadc($id) {
    $dc = paketdc::find($id);
    return view('modul_admin.harga.dc', compact('dc'));
  }

  public function hapuscs($id) {
    $cs = paketcs::find($id);
    $cs->delete();

    return redirect('/admin/harga/cuci-satuan');
  }

  public function hapusck($id) {
    $ck = paketck::find($id);
    $ck->delete();

    return redirect('/admin/harga/cuci-komplit');
  }

  public function hapusdc($id) {
    $dc = paketdc::find($id);
    $dc->delete();

    return redirect('/admin/harga/cuci-dry-clean');
  }

  public function storeck(Request $request) {
    $ck = new paketck();
    $ck->paket_layanan = $request->paket_layanan;
    $ck->qty_perkg = $request->qty_perkg;
    $ck->durasi_kerja = $request->durasi_kerja;
    $ck->harga_perkg = $request->harga_perkg;
    $ck->total_harga = $request->total_harga;
    $ck->save();

    return redirect('/admin/harga/cuci-komplit');
  }

  public function storedc(Request $request) {
    $dc = new paketdc();
    $dc->paket_layanan = $request->paket_layanan;
    $dc->qty_perkg = $request->qty_perkg;
    $dc->durasi_kerja = $request->durasi_kerja;
    $dc->harga_perkg = $request->harga_perkg;
    $dc->total_harga = $request->total_harga;
    $dc->save();

    return redirect('/admin/harga/cuci-dry-clean');
  }

  public function storecs(Request $request) {
    $cs = new paketcs();
    $cs->pakaian = $request->pakaian;
    $cs->qty_perpcs = $request->qty_perpcs;
    $cs->durasi_kerja = $request->lama1;
    $cs->durasi_kerja_kilat = $request->lama2;
    $cs->durasi_kerja_express = $request->lama3;
    $cs->harga_reguler = $request->reguler;
    $cs->harga_kilat = $request->kilat;
    $cs->harga_express = $request->express;
    $cs->save();

    return redirect('/admin/harga/cuci-satuan');
  }

  public function tambah_dc() {
    return view('modul_admin.harga.tambahdc');
  }

  public function tambah_ck() {
    return view('modul_admin.harga.tambahck');
  }

  public function tambah_cs() {
    return view('modul_admin.harga.tambahcs');
  }

  public function update_hargack(Request $request, $id) {
    $ck = paketck::find($id);
    $ck->paket_layanan = $request->paket_layanan;
    $ck->qty_perkg = $request->qty_perkg;
    $ck->durasi_kerja = $request->durasi_kerja;
    $ck->harga_perkg = $request->harga_perkg;
    $ck->total_harga = $request->total_harga;
    $ck->update();

    return redirect('/admin/harga/cuci-komplit');
  }

  public function update_hargadc(Request $request, $id) {
    $ck = paketdc::find($id);
    $ck->paket_layanan = $request->paket_layanan;
    $ck->qty_perkg = $request->qty_perkg;
    $ck->durasi_kerja = $request->durasi_kerja;
    $ck->harga_perkg = $request->harga_perkg;
    $ck->total_harga = $request->total_harga;
    $ck->update();

    return redirect('/admin/harga/cuci-dry-clean');
  }

  public function update_hargacs(Request $request, $id) {
    $cs = paketcs::find($id);
    $cs->pakaian = $request->pakaian;
    $cs->qty_perpcs = $request->qty_perpcs;
    $cs->durasi_kerja = $request->lama1;
    $cs->durasi_kerja_kilat = $request->lama2;
    $cs->durasi_kerja_express = $request->lama3;
    $cs->harga_reguler = $request->reguler;
    $cs->harga_kilat = $request->kilat;
    $cs->harga_express = $request->express;
    $cs->update();

    return redirect('/admin/harga/cuci-satuan');
  }

}
