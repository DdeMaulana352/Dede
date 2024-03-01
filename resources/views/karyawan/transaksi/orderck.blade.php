@extends('layouts.backend')
@section('title','Dashboard Karyawan')
@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@elseif ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-0">
            <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Resi</th>
                        <th>Customer</th>
                        <th>Pelayanan</th>
                        <th>Waktu kerja</th>
                        <th>Kuantitas</th>
                        <th>Tanggal masuk order</th>
                        <th>Total harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php $no=1; ?>
                    @foreach ($ck as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td style="font-weight:bold; font-color:black">{{$item->resi}}</td>
                        <td>{{$item->nama_pel}}</td>
                        <td>{{$item->order_layanan}}</td>
                        <td>{{$item->qty_perkg}} Kg</td>
                        <td>{{$item->tanggal_masuk}}</td>
                        <td>{{$item->tanggal_keluar}}</td>
                        <td>{{$item->total_harga}}</td>
                        <td>{{$item->status}}</td>
                        <td><a name="" id="" class="btn btn-primary" href="/order/detail/{{ $item->id }}" role="Edit">Detail</a>
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

// Update Status Laundry
$(document).on('click', '#updateStatus', function () {
  var id = $(this).attr('data-id-update');
  $.get('update-status-laundry', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
    location.reload()
  });
});

// DATATABLE
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