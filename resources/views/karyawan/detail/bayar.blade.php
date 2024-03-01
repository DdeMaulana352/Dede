@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="row match-height">
    <div class="col-xl-12 col-md-12 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                <span>Nama customer</span>
                    <h2>{{ $ck->nama_pel }}</h2>
                    <hr>
                    <span>Layanan : {{ $ck->order_layanan }}</span> <br>
                    <span>Kuantitas : {{ $ck->qty_perkg }} Kg</span>
                    <hr>
                    <h1>Harga : {{ $ck->total_harga }}</h1>
                    <hr>
                    <form action="/detail/order/selesai/{{$ck->id}}" method="post">
                        @csrf
                        <input type="hidden" name="resi" value="{{ $ck->resi }}">
                        <input type="hidden" name="nama_pel" value="{{ $ck->nama_pel }}">
                        <input type="hidden" name="layanan" value="{{ $ck->order_layanan }}">
                        <input type="hidden" name="durasi" value="{{ $ck->durasi_kerja }}">
                        <input type="hidden" name="qty" value="{{ $ck->qty_perkg }}">
                        <input type="hidden" name="tanggal_masuk" value="{{ $ck->tanggal_masuk }}">
                        <input type="hidden" name="tanggal_keluar" value="{{ $ck->tanggal_keluar }}">
                        <input type="hidden" name="total_harga" value="{{ $ck->total_harga }}">
                        <input type="hidden" name="status" value="{{ $ck->status }}">
                        <input type="hidden" name="alamat" value="{{ $ck->alamat }}">
                        <input type="hidden" name="ket" value="{{ $ck->ket }}">
                        <span>Input nominal bayar</span> 
                        <div class="form-group">
                            <input type="number" class="form-control" name="nominal" id="inputName">
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
              </div>
          </div>
      </div>
    </div>
@endsection