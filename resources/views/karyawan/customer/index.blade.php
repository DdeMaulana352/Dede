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
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-5">
                <a href="{{url('customers-create')}}" class="btn btn-primary">Tambah Customer</a>
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr align="center" style="color:black; font-weight:bold">
                        <th>Nama customer</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($customer as $item)
                    <tr align="center" style="color:black;">
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                          <a href="customer/order/{{ $item->id }}" class="btn btn-sm btn-primary" style="color:white">Tambah orderan</a>
                          <a href="customer/hapus/{{ $item->id }}" class="btn btn-sm btn-danger" style="color:white" onclick="return confirm('Customer {{$item->name}} akan dihapus dari daftar setelah di klik, ingin melanjutkan? ')">Hapus customer</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
// DataTable
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
    });
});
</script>
@endsection