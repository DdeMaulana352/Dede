<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\Hash;
use App\Exports\LaporanExport;
use App\Models\User;
use App\Models\order_ck;
use App\Models\order_cs;
use App\Models\order_dc;
use App\Models\{riwayat_ck, riwayat_dc, riwayat_cs, transaksi, paketck, paketdc, paketcs, Auth};
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function hapus_customer($id) {
        $customer = User::find($id);
        $customer->delete();

        return redirect('/customers');
    }


    public function ck($id) {
        $ck = input_ck::find($id);
        return view('karyawan.input.ck', compact('ck'));
    }

    public function dc($id) {
        $dc = input_dc::find($id);
        return view('karyawan.input.dc', compact('dc'));
    }
    
    public function orderck(Request $request) {

        $complete = new order_ck();
        // resi
        $nock = uniqid();
		$limitNo_ck = substr($nock, 0,7);
		$orderNum_ck = 'CK-' . strtoupper($limitNo_ck);

        $complete->resi = $orderNum_ck;
        $complete->nama_pel = $request->nama;
        $complete->order_layanan = $request->layanan;
        $complete->durasi_kerja = $request->lama;
        $complete->qty_perkg = $request->qty;
        $complete->tanggal_masuk = $request->masuk;
        $complete->tanggal_keluar = $request->keluar;
        $complete->total_harga = $request->harga * $request->qty;
        $complete->status = $request->status;
        $complete->sts_bayar = $request->bayar;
        $complete->bayar = $request->nominal;
        $complete->kembalian = $request->nominal - $complete->total_harga;
        $complete->ket = $request->keterangan;
        $complete->alamat = $request->alamat;
        $complete->save();

        $order = new transaksi();
        $order->resi = $orderNum_ck;
        $order->customer = $request->nama;
        $order->tgl_transaksi   = $request->masuk;
        $order->status_payment  = $request->bayar;
        $order->harga_id        = $request->harga;
        $order->customer        = $request->nama;
        $order->order_layanan = $request->layanan;
        $order->kg              = $request->qty;
        $order->harga           = $request->total_harga * $request->qty;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
    }

    public function orderdc(Request $request) {

        $complete = new order_dc();
        // resi
        $nock = uniqid();
		$limitNo_ck = substr($nock, 0,7);
		$orderNum_ck = 'DC-' . strtoupper($limitNo_ck);

        $complete->resi = $orderNum_ck;
        $complete->nama_pel = $request->nama;
        $complete->order_layanan = $request->layanan;
        $complete->durasi_kerja = $request->lama;
        $complete->qty_perkg = $request->qty;
        $complete->tanggal_masuk = $request->masuk;
        $complete->tanggal_keluar = $request->keluar;
        $complete->total_harga = $request->harga;
        $complete->status = $request->status;
        $complete->sts_bayar = $request->bayar;
        $complete->bayar = $request->nominal;
        $complete->kembalian = $request->nominal - $request->harga;
        $complete->ket = $request->keterangan;
        $complete->alamat = $request->alamat;
        $complete->save();

        $order = new transaksi();
        $order->resi = $orderNum_ck;
        $order->customer = $request->nama;
        $order->tgl_transaksi   = $request->masuk;
        $order->status_payment  = $request->bayar;
        $order->harga_id        = $request->harga;
        $order->customer        = $request->nama;
        $order->order_layanan = $request->layanan;
        $order->kg              = $request->qty;
        $order->harga           = $request->total_harga;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
    }

    public function ordercs(Request $request) {

        $complete = new order_cs();
        // resi
        $nock = uniqid();
		$limitNo_ck = substr($nock, 0,7);
		$orderNum_ck = 'CS-' . strtoupper($limitNo_ck);

        $complete->resi = $orderNum_ck;
        $complete->nama_pel = $request->nama;
        $complete->pakaian = $request->pakaian;
        $complete->order_layanan = $request->layanan;
        $complete->durasi_kerja = $request->lama;
        $complete->qty_perpcs = $request->qty;
        $complete->tanggal_masuk = $request->masuk;
        $complete->tanggal_keluar = $request->keluar;
        $complete->total_harga = $request->harga;
        $complete->status = $request->status;
        $complete->sts_bayar = $request->bayar;
        $complete->bayar = $request->nominal;
        $complete->kembalian = $request->nominal - $request->harga;
        $complete->ket = $request->keterangan;
        $complete->alamat = $request->alamat;
        $complete->save();

        $order = new transaksi();
        $order->resi = $orderNum_ck;
        $order->customer = $request->nama;
        $order->tgl_transaksi   = $request->masuk;
        $order->status_payment  = $request->bayar;
        $order->status_order  = $request->status;
        $order->order_layanan = $request->layanan;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
    }

    public function detailck($id) {
        $ck = order_ck::find($id);
        return view('karyawan.detail.ck', compact('ck'));
    }

    public function detaildc($id) {
        $dc = order_dc::find($id);
        return view('karyawan.detail.dc', compact('dc'));
    }

    public function detailcs($id) {
        $cs = order_cs::find($id);
        return view('karyawan.detail.cs', compact('cs'));
    }

    public function statusck(Request $request, $id) {
        $ck = order_ck::find($id);
        $ck->status = $request->status;
        $ck->save();

        return redirect('/home');
    }

    public function statuscs(Request $request, $id) {
        $cs = order_cs::find($id);
        $cs->status = $request->status;
        $cs->save();

        return redirect('/home');
    }

    public function statusdc(Request $request, $id) {
        $ck = order_dc::find($id);
        $ck->status = $request->status;
        $ck->save();

        return redirect('/home');
    }

    public function bayar($id) {
        $ck = order_ck::find($id);
        return view('karyawan.detail.bayar', compact('ck'));
    }

    public function bayardc($id) {
        $dc = order_dc::find($id);
        return view('karyawan.detail.bayardc', compact('dc'));
    }

    public function bayarcs($id) {
        $cs = order_cs::find($id);
        return view('karyawan.detail.bayarcs', compact('cs'));

    }

    public function selesaick(Request $request, $id) {
        $ck = order_ck::find($id);
        $ck->sts_bayar = "Sudah bayar";
        $ck->bayar = $request->nominal;
        $ck->kembalian = $request->nominal - $request->total_harga;
        $ck->save();

        return redirect('/home');
    }

    public function selesaikan(Request $request, $id) {
        $ck = order_ck::find($id);
        $ck->delete();

        $selesai = new riwayat_ck();
        $selesai->resi = $request->resi;
        $selesai->nama_pel = $request->nama_pel;
        $selesai->order_layanan = $request->layanan;
        $selesai->durasi_kerja = $request->durasi;
        $selesai->qty_perkg = $request->qty;
        $selesai->tanggal_masuk = $request->tanggal_masuk;
        $selesai->tanggal_keluar = $request->tanggal_keluar;
        $selesai->total_harga = $request->total_harga;
        $selesai->bayar = $request->bayar;
        $selesai->kembalian = $request->bayar - $request->total_harga;
        $selesai->sts_bayar = $request->sts_bayar;
        $selesai->status = 'Selesai';
        $selesai->ket = $request->ket;
        $selesai->save();

        $order = new transaksi();
        $order->resi = $request->resi;
        $order->tgl_transaksi   = $request->tanggal_masuk;
        $order->status_payment  = 'Terselesaikan';
        $order->harga_id        = $request->total_harga;
        $order->customer        = $request->nama_pel;
        $order->order_layanan = $request->layanan;
        $order->kg              = $request->qty;
        $order->harga           = $request->total_harga;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
      }

      public function selesaikandc(Request $request, $id) {
        $ck = order_dc::find($id);
        $ck->delete();

        $selesai = new riwayat_dc();
        $selesai->resi = $request->resi;
        $selesai->nama_pel = $request->nama_pel;
        $selesai->order_layanan = $request->layanan;
        $selesai->durasi_kerja = $request->durasi;
        $selesai->qty_perkg = $request->qty;
        $selesai->tanggal_masuk = $request->tanggal_masuk;
        $selesai->tanggal_keluar = $request->tanggal_keluar;
        $selesai->total_harga = $request->total_harga;
        $selesai->bayar = $request->bayar;
        $selesai->kembalian = $request->bayar - $request->total_harga;
        $selesai->sts_bayar = $request->sts_bayar;
        $selesai->status = 'Selesai';
        $selesai->ket = $request->ket;
        $selesai->save();

        $order = new transaksi();
        $order->tgl_transaksi   = $request->tanggal_masuk;
        $order->resi = $request->resi;
        $order->status_payment  = 'Success';
        $order->harga_id        = $request->total_harga;
        $order->customer        = $request->nama_pel;
        $order->order_layanan = $request->layanan;
        $order->kg              = $request->qty;
        $order->harga           = $request->total_harga;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
      }

      public function selesaikancs(Request $request, $id) {
        $ck = order_cs::find($id);
        $ck->delete();

        $selesai = new riwayat_cs();
        $selesai->resi = $request->resi;
        $selesai->nama_pel = $request->nama_pel;
        $selesai->pakaian = $request->pakaian;
        $selesai->order_layanan = $request->layanan;
        $selesai->durasi_kerja = $request->durasi;
        $selesai->qty_perpcs = $request->qty;
        $selesai->tanggal_masuk = $request->tanggal_masuk;
        $selesai->tanggal_keluar = $request->tanggal_keluar;
        $selesai->total_harga = $request->total_harga;
        $selesai->bayar = $request->bayar;
        $selesai->kembalian = $request->bayar - $request->total_harga;
        $selesai->sts_bayar = $request->sts_bayar;
        $selesai->status = 'Selesai';
        $selesai->ket = $request->ket;
        $selesai->save();

        $order = new transaksi();
        $order->tgl_transaksi   = $request->tanggal_masuk;
        $order->resi            = $request->resi;
        $order->status_payment  = $request->sts_bayar;
        $order->status_order  = 'Selesai';
        $order->customer        = $request->nama_pel;
        $order->order_layanan = $request->layanan;
        $order->pcs              = $request->qty;
        $order->harga           = $request->total_harga;
        $order->tgl_ambil       = $request->tanggal_keluar;
        $order->tgl               = Carbon::now()->day;
        $order->bulan             = Carbon::now()->month;
        $order->tahun             = Carbon::now()->year;
        $order->save();

        return redirect('/home');
      }

    public function selesaidc(Request $request, $id) {
        $ck = order_dc::find($id);
        $ck->sts_bayar = "Sudah Bayar";
        $ck->bayar = $request->nominal;
        $ck->kembalian = $request->nominal - $request->total_harga;
        $ck->save();

        return redirect('/home');
    }

    public function selesaics(Request $request, $id) {
        $ck = order_cs::find($id);
        $ck->sts_bayar = "Sudah bayar";
        $ck->bayar = $request->nominal;
        $ck->kembalian = $request->nominal - $request->total_harga;
        $ck->save();

        return redirect('/home');
    }

    public function laporan($id) {
        $laporan = riwayat_ck::find($id);
        return view('karyawan.laporan.detail', compact('laporan'));
    }

    public function laporan_ck(){
        $ck = riwayat_ck::all();
        return view('karyawan.laporan.ck', compact('ck'));
    }

    public function laporan_dc(){
        $dc = riwayat_dc::all();
        return view('karyawan.laporan.dc', compact('dc'));
    }

    public function laporan_cs(){
        $cs = riwayat_cs::all();
        return view('karyawan.laporan.cs', compact('cs'));
    }

    public function customer_order($id) {
        $user = User::find($id);
        return view('karyawan.customer.welcome', compact('user'));
    }

    public function customer_order_ck($id) {
        $user = User::find($id);
        $paket = paketck::all();
        return view('karyawan.customer.ck', compact('user','paket'))
        ->with('paketJson', json_encode($paket));

    }

    public function customer_order_dc($id) {
        $user = User::find($id);
        $paket = paketdc::all();
        return view('karyawan.customer.ck', compact('user','paket'))
        ->with('paketJson', json_encode($paket));
    }

    public function customer_order_cs($id) {
        $user = User::find($id);
        $paket = paketcs::all();
        return view('karyawan.customer.cs', compact('user', 'paket'))
        ->with('paketJson', json_encode($paket));
    }

}
