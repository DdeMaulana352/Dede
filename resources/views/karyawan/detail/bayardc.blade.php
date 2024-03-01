@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="row match-height">
    <div class="col-xl-12 col-md-12 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                <span>Nama customer</span>
                    <h2>{{ $dc->nama_pel }}</h2>
                    <hr>
                    <span>Layanan : {{ $dc->order_layanan }}</span> <br>
                    <span>Kuantitas : {{ $dc->qty_perkg }} Kg</span>
                    <hr>
                    <h1>Harga : {{ $dc->total_harga }}</h1>
                    <form action="/detail/order/selesai/dc/{{$dc->id}}" method="post">
                        @csrf
                        <input type="hidden" name="resi" value="{{ $dc->resi }}">
                        <input type="hidden" name="nama_pel" value="{{ $dc->nama_pel }}">
                        <input type="hidden" name="layanan" value="{{ $dc->order_layanan }}">
                        <input type="hidden" name="durasi" value="{{ $dc->durasi_kerja }}">
                        <input type="hidden" name="qty" value="{{ $dc->qty_perkg }}">
                        <input type="hidden" name="tanggal_masuk" value="{{ $dc->tanggal_masuk }}">
                        <input type="hidden" name="tanggal_keluar" value="{{ $dc->tanggal_keluar }}">
                        <input type="hidden" name="total_harga" value="{{ $dc->total_harga }}">
                        <input type="hidden" name="status" value="{{ $dc->status }}">
                        <input type="hidden" name="alamat" value="{{ $dc->alamat }}">
                        <input type="hidden" name="ket" value="{{ $dc->ket }}">
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
<script>
    document.getElementById('nml').value = "njka";

</script>