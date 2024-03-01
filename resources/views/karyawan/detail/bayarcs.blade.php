@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="row match-height">
    <div class="col-xl-12 col-md-12 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                <span>Nama customer</span>
                    <h2>{{ $cs->nama_pel }}</h2>
                    <hr>
                    <span>Layanan : {{ $cs->order_layanan }}</span> <br>
                    <span>Kuantitas : {{ $cs->qty_perpcs }} Pcs</span>
                    <hr>
                    <h1>Harga : {{ $cs->total_harga }}</h1>
                    <form action="/detail/order/selesai/cs/{{$cs->id}}" method="post">
                        @csrf
                        <input type="hidden" name="resi" value="{{ $cs->resi }}">
                        <input type="hidden" name="nama_pel" value="{{ $cs->nama_pel }}">
                        <input type="hidden" name="pakaian" value="{{ $cs->pakaian }}">
                        <input type="hidden" name="layanan" value="{{ $cs->order_layanan }}">
                        <input type="hidden" name="durasi" value="{{ $cs->durasi_kerja }}">
                        <input type="hidden" name="qty" value="{{ $cs->qty_perpcs }}">
                        <input type="hidden" name="tanggal_masuk" value="{{ $cs->tanggal_masuk }}">
                        <input type="hidden" name="tanggal_keluar" value="{{ $cs->tanggal_keluar }}">
                        <input type="hidden" name="total_harga" value="{{ $cs->total_harga }}">
                        <input type="hidden" name="status" value="{{ $cs->status }}">
                        <input type="hidden" name="alamat" value="{{ $cs->alamat }}">
                        <input type="hidden" name="ket" value="{{ $cs->ket }}">
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