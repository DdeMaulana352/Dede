@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
  <div class="col-sm-2 col-md-12">
    <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="card-body">
                <div class="card-text">
                    <dl class="row">
                        <dt class="col-sm-4">Resi</dt>
                        <dd class="col-sm-4">: {{ $laporan->resi }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Nama pelanggan</dt>
                        <dd class="col-sm-4">: {{ $laporan->nama_pel }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Layanan order</dt>
                        <dd class="col-sm-4">: {{ $laporan->order_layanan }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Estimasi kerja</dt>
                        <dd class="col-sm-4">: {{ $laporan->durasi_kerja }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Kuantitas</dt>
                        <dd class="col-sm-4">: {{ $laporan->qty_perkg }} Kg</dd>
                    </dl>
                </div>
                    <dl class="row">
                        <dt class="col-sm-4">Tanggal masuk order</dt>
                        <dd class="col-sm-4">: {{ $laporan->tanggal_masuk }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Perkiraan selesai</dt>
                        <dd class="col-sm-4">: {{ $laporan->tanggal_keluar }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Harga laundry</dt>
                        <dd class="col-sm-4">: {{ $laporan->total_harga }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: {{ $laporan->bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">kembalian</dt>
                        <dd class="col-sm-4">: {{ $laporan->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status order</dt>
                        <dd class="col-sm-4">: {{ $laporan->status }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $laporan->status }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $laporan->ket }}</dd>
                    </dl>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection