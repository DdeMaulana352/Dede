@extends('layouts.backend')
@section('title','Karyawan - Laporan Laundry')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Laporan Laundry
            </h4>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Resi</th>
                            <th>Nama Customer</th>
                            <th>Jenis pakaian</th>
                            <th>Layanan</th>
                            <th>Estimasi</th>
                            <th>Kuantitas</th>
                            <th>Tanggal masuk</th>
                            <th>Tanggal keluar</th>
                            <th>Total harga</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                      <?php $no=1; ?>
                      @foreach ($cs as $laporans)
                        <tr>
                          <td>{{$laporans->resi}}</td>
                          <td>{{$laporans->nama_pel}}</td>
                          <td>{{$laporans->pakaian}}</td>
                          <td>{{$laporans->order_layanan}}</td>
                          <td>{{$laporans->durasi_kerja}}</td>
                          <td>{{$laporans->qty_perpcs}} Pcs</td>
                          <td>{{$laporans->tanggal_masuk}}</td>
                          <td>{{$laporans->tanggal_keluar}}</td>
                          <td>{{$laporans->total_harga}}</td>
                          <td>{{$laporans->bayar}}</td>
                          <td>{{$laporans->kembalian}}</td>
                          <td>{{$laporans->status}}</td>
                          <td>{{$laporans->ket}}</td>
                        </tr>
                      <?php $no++; ?>
                      @endforeach
                    </tbody>
                </table>
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