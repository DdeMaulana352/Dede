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
                        <dt class="col-sm-4">Nama customer</dt>
                        <dd class="col-sm-4">: {{ $cs->nama_pel }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Nomor resi</dt>
                        <dd class="col-sm-4">: {{ $cs->resi }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Layanan order</dt>
                        <dd class="col-sm-4">: {{ $cs->order_layanan }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Pakaian</dt>
                        <dd class="col-sm-4">: {{ $cs->pakaian }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Estimasi kerja</dt>
                        <dd class="col-sm-4">: {{ $cs->durasi_kerja }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status cuci</dt>
                        <dd class="col-sm-4">: {{ $cs->status }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Kuantitas</dt>
                        <dd class="col-sm-4">: {{ $cs->qty_perpcs }} Pcs</dd>
                    </dl>
                </div>
                    <dl class="row">
                        <dt class="col-sm-4">Tanggal masuk order</dt>
                        <dd class="col-sm-4">: {{ $cs->tanggal_masuk }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Perkiraan selesai </dt>
                        <dd class="col-sm-4">: {{ $cs->tanggal_keluar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Harga orderan</dt>
                        <dd class="col-sm-4">: {{ $cs->total_harga }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status bayar</dt>
                        <dd class="col-sm-4">: {{ $cs->sts_bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Kembalian</dt>
                        <dd class="col-sm-4">: {{ $cs->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $cs->alamat }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $cs->ket }}</dd>
                    </dl>
@endsection