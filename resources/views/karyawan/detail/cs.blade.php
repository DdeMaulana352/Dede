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
                        <dt class="col-sm-4">Jenis pakaian</dt>
                        <dd class="col-sm-4">: {{ $cs->pakaian }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Layanan order</dt>
                        <dd class="col-sm-4">: {{ $cs->order_layanan }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Estimasi kerja</dt>
                        <dd class="col-sm-4">: {{ $cs->durasi_kerja }}</dd>
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
                    @if ($cs->bayar == null)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: 0</dd>
                    </dl>
                    @elseif ($cs->bayar)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: {{ $cs->bayar }}</dd>
                    </dl>
                    @endif
                    <dl class="row">
                        <dt class="col-sm-4">Kembalian</dt>
                        <dd class="col-sm-4">: {{ $cs->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status bayar</dt>
                        <dd class="col-sm-4">: {{ $cs->sts_bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $cs->alamat }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $cs->ket }}</dd>
                    </dl>
                    <form action="/detail/order/status/cs/{{$cs->id}}" method="post">
                        @csrf
                    <dl class="row">
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-4">
                        <select class="custom-select" name="status" id="">
                            <option selected>{{ $cs->status }}</option>
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
                        @if ($cs->sts_bayar == 'Belum bayar')
                    <a name="" id="" class="btn-sm btn-warning" href="/detail/order/bayar/cs/{{ $cs->id }}" role="bayar">Pembayaran</a>
                    @endif
                    </form>
                    <h6 style =color:red;>Klik tombol dibawah ini untuk menyelesaikan orderan untuk pengguna</h6>
                    <form action="/customer/order/selesaikan/cs/{{ $cs->id }}" method="post">
                    @csrf
                        <input type="hidden" name="resi" value="{{ $cs->resi }}">
                        <input type="hidden" name="nama_pel" value="{{ $cs->nama_pel }}">
                        <input type="hidden" name="layanan" value="{{ $cs->order_layanan }}">
                        <input type="hidden" name="pakaian" value="{{ $cs->pakaian }}">
                        <input type="hidden" name="durasi" value="{{ $cs->durasi_kerja }}">
                        <input type="hidden" name="qty" value="{{ $cs->qty_perpcs}}">
                        <input type="hidden" name="tanggal_masuk" value="{{ $cs->tanggal_masuk }}">
                        <input type="hidden" name="tanggal_keluar" value="{{ $cs->tanggal_keluar }}">
                        <input type="hidden" name="total_harga" value="{{ $cs->total_harga }}">
                        <input type="hidden" name="status" value="{{ $cs->status }}">
                        <input type="hidden" name="sts_bayar" value="{{ $cs->sts_bayar }}">
                        <input type="hidden" name="kembalian" value="{{ $cs->kembalian }}">
                        <input type="hidden" name="alamat" value="{{ $cs->alamat }}">
                        <input type="hidden" name="bayar" value="{{ $cs->bayar }}">
                        <input type="hidden" name="ket" value="{{ $cs->ket }}">
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