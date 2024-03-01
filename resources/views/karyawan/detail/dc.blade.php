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
                    @if ($dc->bayar == null)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: 0</dd>
                    </dl>
                    @elseif ($dc->bayar)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: {{ $dc->bayar }}</dd>
                    </dl>
                    @endif
                    <dl class="row">
                        <dt class="col-sm-4">Kembalian</dt>
                        <dd class="col-sm-4">: {{ $dc->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status bayar</dt>
                        <dd class="col-sm-4">: {{ $dc->sts_bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $dc->alamat }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $dc->ket }}</dd>
                    </dl>
                    <form action="/detail/order/status/dc/{{$dc->id}}" method="post">
                        @csrf
                    <dl class="row">
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-4">
                        <select class="custom-select" name="status" id="">
                            <option selected>{{ $dc->status }}</option>
                            <option value="Pengeringan">Pengeringan</option>
                            <option value="Penjemuran">Penjemuran</option>
                            <option value="Proses setrika">Proses setrika</option>
                            <option value="Segera ambil">Segera ambil</option>
                            <option value="Pengiriman">Pengiriman</option>
                        </select>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Action</dt>
                        <dd class="col-sm-4"><button type="submit" class="btn-sm btn-primary">Ubah status</button> 
                        @if ($dc->sts_bayar == 'Belum bayar')
                    <a name="" id="" class="btn-sm btn-warning" href="/detail/order/bayar/dc/{{ $dc->id }}" role="bayar">Pembayaran</a>
                    @endif
                    </form>
                    <hr>
                    <h6 style =color:red;>Klik tombol dibawah ini untuk menyelesaikan orderan untuk pengguna</h6>
                    <form action="/customer/order/selesaikan/dc/{{ $dc->id }}" method="post">
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
                        <input type="hidden" name="sts_bayar" value="{{ $dc->sts_bayar }}">
                        <input type="hidden" name="kembalian" value="{{ $dc->kembalian }}">
                        <input type="hidden" name="alamat" value="{{ $dc->alamat }}">
                        <input type="hidden" name="bayar" value="{{ $dc->bayar }}">
                        <input type="hidden" name="ket" value="{{ $dc->ket }}">
                        <button type="submit"  class="btn btn-success">Selesaikan</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection