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
                        <tr><th>No</th>
                            <th>Resi</th>
                            <th>Nama Customer</th>
                            <th>Selengkapnya</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                      <?php $no=1; ?>
                      @foreach ($laporan as $laporans)
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$laporans->resi}}</td>
                          <td>{{$laporans->nama_pel}}</td>
                          <td><a name="" id="" class="btn btn-primary" href="laporan/detail/{{ $laporans->id }}" role="button">Detail pelanggan</a></td>
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