<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\{Notification, LaundrySetting, transaksi,User, order_ck, order_dc, order_cs, riwayat_ck, riwayat_dc, riwayat_cs};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function contact() {
        return view('contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
          if (Auth::user()->auth === "Admin") {
            $chartMonthSalary = DB::table('transaksis')
            ->select('bulan', DB::raw('sum(harga) AS jml'))
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
        
            $incomeAll = transaksi::where('status_payment','Success')->sum('harga');
            $incomeY = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
            ->sum('harga');
        
            $incomeM = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
            ->where('bulan', ltrim(date('m'),'0'))->sum('harga');
        
            $incomeYOld = transaksi::where('status_payment','Success')->where('tahun',date("Y",strtotime("-1 year")))
            ->sum('harga');
        
            $incomeD = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
            ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('harga');
        
            $incomeDOld = transaksi::where('status_payment','Success')->where('tahun',date('Y'))
            ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date("d",strtotime("-1 day")),'0'))->sum('harga');
        
            $kgDay = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('kg');
            $kgMonth = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->sum('kg');
            $kgYear = transaksi::where('tahun',date('Y'))->sum('kg');

            $pcsDay = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('pcs');
            $pcsMonth = transaksi::where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->sum('pcs');
            $pcsYear = transaksi::where('tahun',date('Y'))->sum('pcs');
        
            $getCabang = User::whereHas('transaksi', function($a) {
              $a->where('tahun',date('Y'))
              ->where('bulan', ltrim(date('m'),'0'));
            })
            ->get();
        
            $target = LaundrySetting::first();
        
            return view('modul_admin.finance.index', \compact(
              'chartMonth','incomeY','incomeM','incomeYOld','incomeD','incomeDOld',
              'target','incomeAll','getCabang','kgDay','kgMonth','kgYear', 'pcsDay', 'pcsMonth', 'pcsYear'
            ));

          } elseif(Auth::user()->auth === "Karyawan") {
                $ck = order_ck::all();
                $cs = order_cs::all();
                $dc = order_dc::all();
              $masuk = transaksi::whereIN('status_order',['Process','Done','Delivery'])->where('user_id',auth::user()->id)->count();
              $selesai = transaksi::where('status_order','Done')->where('user_id',auth::user()->id)->count();
              $diambil = transaksi::where('status_order','Delivery')->where('user_id',auth::user()->id)->count();
              $customer = User::where('karyawan_id',auth::user()->id)->get();

              $kgToday = transaksi::where('user_id',Auth::id())->where('tahun',date('Y'))
              ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date('d'),'0'))->sum('kg');

              $kgTodayOld = transaksi::where('user_id',Auth::id())->where('tahun',date('Y'))
              ->where('bulan', ltrim(date('m'),'0'))->where('tgl',ltrim(date("d",strtotime("-1 day")),'0'))->sum('kg');

              $incomeM = transaksi::where('user_id',Auth::id())->where('status_payment','Success')
              ->where('tahun',date('Y'))->where('bulan', ltrim(date('m'),'0'))->sum('harga_akhir');

              $incomeMOld = transaksi::where('user_id',Auth::id())->where('status_payment','Success')
              ->where('tahun',date('Y'))->where('bulan', ltrim(date('m',strtotime("-1 month")),'0'))->sum('harga_akhir');

              $persen = 0;
              if ($incomeMOld != null && $incomeM != null) {
                $persen =  ($incomeM - $incomeMOld) / $incomeM * 100;
              }

              // Statistik Bulanan
              $bln = DB::table('transaksis')
              ->  select('bulan', DB::raw('count(id) AS jml'))
              ->  whereYear('created_at','=',date("Y", strtotime(now())))
              ->  whereMonth('created_at','=',date("m", strtotime(now())))
              ->  groupBy('bulan')
              ->  get();

              $bulans = '';
              $batas =  12;
              $nilaiB = '';
              for($_i=1; $_i <= $batas; $_i++){
                  $bulans = $bulans . (string)$_i . ',';
                  $_check = false;
                  foreach($bln as $_data){
                      if((int)@$_data->bulan === $_i){
                          $nilaiB = $nilaiB . (string)$_data->jml . ',';
                          $_check = true;
                      }
                  }
                  if(!$_check){
                      $nilaiB = $nilaiB . '0,';
                  }
              }

              return view('karyawan.index', compact('ck', 'cs', 'dc'))
                  ->  with('diambil', $diambil)
                  ->  with('masuk',$masuk)
                  ->  with('selesai',$selesai)
                  ->  with('customer', $customer)
                  ->  with('kgToday', $kgToday)
                  ->  with('kgTodayOld', $kgTodayOld)
                  ->  with('incomeM',$incomeM)
                  ->  with('incomeMOld',$incomeMOld)
                  ->  with('persen',$persen)
                  ->  with('_bulan', substr($bulans, 0,-1))
                  ->  with('_nilaiB', substr($nilaiB, 0, -1));

          }elseif(Auth::user()->auth == 'Customer'){
            $totalLaundry = order_ck::where('nama_pel', Auth::user()->name)->count();
            $totalLaundrydc = order_dc::where('nama_pel', Auth::user()->name)->count();
            $totalLaundrycs = order_cs::where('nama_pel', Auth::user()->name)->count();

            $riwayatck = riwayat_ck::where('nama_pel', Auth::user()->name)->sum('qty_perkg');
            $riwayatcs = riwayat_cs::where('nama_pel', Auth::user()->name)->sum('qty_perpcs');
            $riwayatdc = riwayat_dc::where('nama_pel', Auth::user()->name)->sum('qty_perkg');

            $selesaick = riwayat_ck::where('nama_pel', Auth::user()->name)->sum('qty_perkg');
            $selesaics = riwayat_cs::where('nama_pel', Auth::user()->name)->sum('qty_perpcs');
            $selesaidc = riwayat_dc::where('nama_pel', Auth::user()->name)->sum('qty_perkg');

            $ck = order_ck::where('nama_pel', Auth::user()->name)->get();
            $dc = order_dc::where('nama_pel', Auth::user()->name)->get();
            $cs = order_cs::where('nama_pel', Auth::user()->name)->get();

            $transaksi = transaksi::with('price')->where('customer_id',Auth::id())->get();
            return view('customer.index',\compact('totalLaundry','totalLaundrydc','totalLaundrycs', 'ck', 'cs', 'dc', 'riwayatck', 'riwayatdc', 'riwayatcs','selesaick', 'selesaidc', 'selesaics'));
          }
        }
    }

    // Read Notifikasi
    public function readNotifikasi(Request $request)
    {
        $notif = Notification::find($request->id);
        $notif->update([
            'is_read'   => 1
        ]);

        return $notif;
    }

}
