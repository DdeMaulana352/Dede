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
                        <dd class="col-sm-4">: {{ $ck->nama_pel }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Nomor resi</dt>
                        <dd class="col-sm-4">: {{ $ck->resi }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Layanan order</dt>
                        <dd class="col-sm-4">: {{ $ck->order_layanan }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Estimasi kerja</dt>
                        <dd class="col-sm-4">: {{ $ck->durasi_kerja }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Kuantitas</dt>
                        <dd class="col-sm-4">: {{ $ck->qty_perkg }} Kg</dd>
                    </dl>
                </div>
                    <dl class="row">
                        <dt class="col-sm-4">Tanggal masuk order</dt>
                        <dd class="col-sm-4">: {{ $ck->tanggal_masuk }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Perkiraan selesai </dt>
                        <dd class="col-sm-4">: {{ $ck->tanggal_keluar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Harga orderan</dt>
                        <dd class="col-sm-4">: {{ $ck->total_harga }}</dd>
                    </dl>
                    @if ($ck->bayar == null)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: 0</dd>
                    </dl>
                    @elseif ($ck->bayar)
                    <dl class="row">
                        <dt class="col-sm-4">Nominal bayar</dt>
                        <dd class="col-sm-4">: {{ $ck->bayar }}</dd>
                    </dl>
                    @endif
                    <dl class="row">
                        <dt class="col-sm-4">Kembalian</dt>
                        <dd class="col-sm-4">: {{ $ck->kembalian }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Status bayar</dt>
                        <dd class="col-sm-4">: {{ $ck->sts_bayar }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-4">: {{ $ck->alamat }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-4">: {{ $ck->ket }}</dd>
                    </dl>
                    <form action="/detail/order/status/ck/{{$ck->id}}" method="post">
                        @csrf
                    <dl class="row">
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-4">
                        <select class="custom-select" name="status" id="">
                            <option selected>{{ $ck->status }}</option>
                            <option value="Pengeringan">Proses pengeringan</option>
                            <option value="Penjemuran">Proses penjemuran</option>
                            <option value="Proses setrika">Proses setrika</option>
                            <option value="Segera ambil">Segera ambil</option>
                            <option value="Pengiriman">Pengiriman ke tujuan</option>
                        </select>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Action</dt>
                        <dd class="col-sm-4"><button type="submit" class="btn-sm btn-primary">Ubah status</button> 
                        @if ($ck->sts_bayar == 'Belum bayar')
                    <a name="" id="" class="btn-sm btn-warning" href="/detail/order/bayar/ck/{{ $ck->id }}" role="bayar">Pembayaran</a>
                    @endif
                    </form>
                    </dd>
                    </dl>
                    <hr>
                    </form>
                    <h6 style =color:red;>Klik tombol dibawah ini untuk menyelesaikan orderan untuk pengguna</h6>
                    <form action="/customer/order/selesaikan/{{ $ck->id }}" method="post">
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
                        <input type="hidden" name="sts_bayar" value="{{ $ck->sts_bayar }}">
                        <input type="hidden" name="kembalian" value="{{ $ck->kembalian }}">
                        <input type="hidden" name="alamat" value="{{ $ck->alamat }}">
                        <input type="hidden" name="bayar" value="{{ $ck->bayar }}">
                        <input type="hidden" name="ket" value="{{ $ck->ket }}">
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