@extends('layouts.backend')
@section('title','Karyawan - Data Customer')
@section('header','Data Customer')
@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@elseif($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
<div class="position-relative">
  <div class="position-absolute bottom-0 start-0"></div>
  <div class="position-absolute bottom-0 end-0"></div>
</div>
<div class="card">
    <div class="card-body">
    <h5>Transaksi order cuci Kiloan</h5>
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr align="center" style="color:black; font-weight:bold">
                        <th>#</th>
                        <th>Resi</th>
                        <th>Nama customer</th>
                        <th>Order layanan</th>
                        <th>Status pengerjaan</th>
                        <th>Status bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($ck as $item)
                    <tr align="center" style="color:black;">
                        <td>{{$no}}</td>
                        <td>{{$item->resi}}</td>
                        <td>{{$item->nama_pel}}</td>
                        <td>{{$item->order_layanan}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->sts_bayar}}</td>
                        <td><a name="" id="" class="btn btn-primary" href="/order/detail/ck/{{ $item->id }}" role="button">Detail</a>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        <hr> <hr>
    <br>
<h5>Transaksi order cuci dry clean</h5>
    <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr align="center" style="color:black; font-weight:bold">
                        <th>#</th>
                        <th>Resi</th>
                        <th>Nama customer</th>
                        <th>Order layanan</th>
                        <th>Status pengerjaan</th>
                        <th>Status bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($dc as $item)
                    <tr align="center" style="color:black;">
                        <td>{{$no}}</td>
                        <td>{{$item->resi}}</td>
                        <td>{{$item->nama_pel}}</td>
                        <td>{{$item->order_layanan}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{ $item->sts_bayar }}</td>
                        <td><a name="" id="" class="btn btn-primary" href="/order/detail/dc/{{ $item->id }}" role="button">Detail</a></td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            <hr> <hr>
            <br>
<h5>Transaksi order cuci Satuan</h5>
    <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr align="center" style="color:black; font-weight:bold">
                        <th>#</th>
                        <th>Resi</th>
                        <th>Nama customer</th>
                        <th>Order layanan</th>
                        <th>Status pengerjaan</th>
                        <th>Status bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($cs as $item)
                    <tr align="center" style="color:black;">
                        <td>{{$no}}</td>
                        <td>{{$item->resi}}</td>
                        <td>{{$item->nama_pel}}</td>
                        <td>{{$item->order_layanan}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->sts_bayar }}</td>
                        <td><a name="" id="" class="btn btn-primary" href="/order/detail/cs/{{ $item->id }}" role="button">Detail</a></td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
