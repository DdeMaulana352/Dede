@extends('layouts.backend')
@section('title','Karyawan - Laporan Laundry')
@section('content')
<div class="col-lg-12">
    <div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
             Semua riwayat transaksi cuci dry clean customer
            </h4>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Resi</th>
                            <th>Nama Customer</th>
                            <th>Order layanan</th>
                            <th>Lama pengerjaan</th>
                            <th>Kuantitas</th>
                            <th>Tanggal masuk</th>
                            <th>Tanggal keluar</th>
                            <th>Harga total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Status pembayaran</th>
                            <th>Status order</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                      <?php $no=1; ?>
                      @foreach ($dc as $order)
                        <tr>
                          <td>{{$order->resi}}</td>
                          <td>{{$order->nama_pel}}</td>
                          <td>{{$order->order_layanan}}</td>
                          <td>{{$order->durasi_kerja}}</td>
                          <td>{{$order->qty_perkg}} Kg</td>
                          <td>{{$order->tanggal_masuk}}</td>
                          <td>{{$order->tanggal_keluar}}</td>
                          <td>{{$order->total_harga}}</td>
                          <td>{{$order->bayar}}</td>
                          <td>{{$order->kembalian}}</td>
                          <td>{{$order->sts_bayar}}</td>
                          <td>{{$order->status}}</td>
                          <td>{{$order->ket}}</td>
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