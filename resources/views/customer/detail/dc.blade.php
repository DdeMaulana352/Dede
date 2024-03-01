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
                        <dd class="col-sm-4">: {{ $dc->nama_pel }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Nomor resi</dt>
                        <dd class="col-sm-4">: {{ $dc->resi }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Layanan order</dt>
                        <dd class="col-sm-4">: {{ $dc->order_layanan }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Estimasi kerja</dt>
                        <dd class="col-sm-4">: {{ $dc->durasi_kerja }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status cuci</dt>
                        <dd class="col-sm-4">: {{ $dc->status }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Kuantitas</dt>
                        <dd class="col-sm-4">: {{ $dc->qty_perkg }} Kg</dd>
                    </dl>
                </div>
                    <dl class="row">
                        <dt class="col-sm-4">Tanggal masuk order</dt>
                        <dd class="col-sm-4">: {{ $dc->tanggal_masuk }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Perkiraan selesai </dt>
                        <dd class="col-sm-4">: {{ $dc->tanggal_keluar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Harga orderan</dt>
                        <dd class="col-sm-4">: {{ $dc->total_harga }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status bayar</dt>
                        <dd class="col-sm-4">: {{ $dc->sts_bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Kembalian</dt>
                        <dd class="col-sm-4">: {{ $dc->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $dc->alamat }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $dc->ket }}</dd>
                    </dl>
@endsection