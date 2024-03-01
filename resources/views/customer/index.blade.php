@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
 <div class="row match-height">
      <div class="col-xl-12 col-md-6 col-12">
          <div class="card card-congratulation-medal">
              <div class="card-body">
                  <h5>Welcome 🎉 {{Auth::user()->name}}!</h5>
                  <p class="card-text font-small-2">Semoga harimu menyenangkan.</p> <br>
                  {{date('l, d F Y')}}, {{date('H:i:s')}}
              </div>
          </div>
      </div>
      <!--/ Medal Card --> 
        <div class="col-xl-12 col-md-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-xl-12 col-md-6 col-12">
              <div class="card-body statistics-body">
              <h4 class="card-title">
              Data transaksi cuci Kiloan kamu
            </h4>
            <br>
                  <div class="row">
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundry}} buah</h4>
                                  <p class="card-text font-small-1 mb-0">Jumlah orderan laundry cuci Kiloan</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-primary mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-check text-primary font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$selesaick}} Total</h4>
                                  <p class="card-text font-small-1 mb-0">Laundry cuci Kiloan selesai</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundry}} Kg</h4>
                                  <p class="card-text font-small-1 mb-2">Total proses laundry cuci Kiloan</p>
                              </div>
                          </div>
                      </div>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Resi</th>
                    <th>TGL Transaksi</th>
                    <th>Status</th>
                    <th>Order layanan</th>
                    <th>Kuantitas</th>
                    <th>Estimasi kerja</th>
                    <th>Harga</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ck as $k)
                    <tr>
                      <td> {{$k->resi}} </td>
                      <td> {{$k->tanggal_masuk}} </td>
                      <td> {{$k->status}} </td>
                      <td> {{$k->order_layanan}} </td>
                      <td> {{$k->qty_perkg}} kg</td>
                      <td> {{$k->durasi_kerja}} </td>
                      <td> {{$k->total_harga}} </td>
                      <td>
                        <a href="/customer/detail/ck/{{ $k->id }}" class="btn btn-sm btn-info">Detail</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
 
        
  <div class="col-xl-12 col-md-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-xl-12 col-md-6 col-12">
              <div class="card-body statistics-body">
              <h4 class="card-title">
              Data transaksi cuci dry clean kamu 
            </h4>
            <br>
                  <div class="row">
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundrydc}} buah</h4>
                                  <p class="card-text font-small-1 mb-0">Jumlah orderan laundry cuci dry clean</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-primary mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-check text-primary font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$selesaidc}} Total</h4>
                                  <p class="card-text font-small-1 mb-0">Laundry cuci dry clean selesai</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundrydc}} Kg</h4>
                                  <p class="card-text font-small-1 mb-2">Total proses laundry cuci dry clean</p>
                              </div>
                          </div>
                      </div>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Resi</th>
                    <th>TGL Transaksi</th>
                    <th>Status</th>
                    <th>Order layanan</th>
                    <th>Kuantitas</th>
                    <th>Estimasi kerja</th>
                    <th>Harga</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dc as $k)
                    <tr>
                      <td> {{$k->resi}} </td>
                      <td> {{$k->tanggal_masuk}} </td>
                      <td> {{$k->status}} </td>
                      <td> {{$k->order_layanan}} </td>
                      <td> {{$k->qty_perkg}} kg</td>
                      <td> {{$k->durasi_kerja}} </td>
                      <td> {{$k->total_harga}} </td>
                      <td>
                        <a href="/customer/detail/dc/{{ $k->id }}" class="btn btn-sm btn-info">Detail</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

 
      
  <div class="col-xl-12 col-md-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-xl-12 col-md-6 col-12">
              <div class="card-body statistics-body">
              <h4 class="card-title">
              Data transaksi cuci satuan kamu
            </h4>
            <br>
                  <div class="row">
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundrycs}} buah</h4>
                                  <p class="card-text font-small-1 mb-0">Jumlah orderan laundry cuci satuan</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-primary mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-check text-primary font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$selesaics}} Total</h4>
                                  <p class="card-text font-small-1 mb-0">Laundry cuci satuan selesai</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                          <div class="media">
                              <div class="avatar bg-light-info mr-2">
                                  <div class="avatar-content">
                                      <i class="feather icon-box text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <div class="media-body my-auto">
                                  <h4 class="font-weight-bolder mb-0">{{$totalLaundrycs}} Pcs</h4>
                                  <p class="card-text font-small-1 mb-2">Total proses laundry cuci satuan</p>
                              </div>
                          </div>
                      </div>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Resi</th>
                    <th>TGL Transaksi</th>
                    <th>Status</th>
                    <th>Order layanan</th>
                    <th>Kuantitas</th>
                    <th>Estimasi kerja</th>
                    <th>Harga</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cs as $k)
                    <tr>
                      <td> {{$k->resi}} </td>
                      <td> {{$k->tanggal_masuk}} </td>
                      <td> {{$k->status}} </td>
                      <td> {{$k->order_layanan}} </td>
                      <td> {{$k->qty_perpcs}} pcs</td>
                      <td> {{$k->durasi_kerja}} </td>
                      <td> {{$k->total_harga}} </td>
                      <td>
                        <a href="/customer/detail/cs/{{ $k->id }}" class="btn btn-sm btn-info">Detail</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
@endsection

