@extends('layouts.backend')
@section('title','Karyawan - Laporan Laundry')
@section('content')
<div class="col-lg-12">
    <div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
              Semua transaksi cuci kiloan customer
            </h4>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Resi</th>
                            <th>Nama Customer</th>
                            <th>Order layanan</th>
                            <th>Tanggal masuk</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                      <?php $no=1; ?>
                      @foreach ($ck as $order)
                        <tr>
                          <td>{{$order->resi}}</td>
                          <td>{{$order->nama_pel}}</td>
                          <td>{{$order->order_layanan}}</td>
                          <td>{{$order->tanggal_masuk}}</td>
                          <td><a name="" id="" class="btn btn-danger" href="/transaksi/detail/ck/{{ $order->id }}" role="button">Detail</a></td>
                        </tr>
                      <?php $no++; ?>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
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