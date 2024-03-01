@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')

        <div class="card">
          <div class="card-body">
          <h4 class="card-title">
              Data riwayat Kamu
            </h4>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Resi</th>
                    <th>Order layanan</th>
                    <th>Lama kerja</th>
                    <th>Kuantitas</th>
                    <th>Tanggal masuk orderan</th>
                    <th>Tanggal keluar orderan</th>
                    <th>harga</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Status</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ck as $key => $k)
                    <tr>
                      <td> {{$k->resi}} </td>
                      <td> {{$k->order_layanan}} </td>
                      <td> {{$k->durasi_kerja}} </td>
                      <td> {{$k->qty_perkg}} Kg</td>
                      <td> {{$k->tanggal_masuk}} </td>
                      <td> {{$k->tanggal_keluar}} </td>
                      <td> {{$k->total_harga}} </td>
                      <td> {{$k->bayar}} </td>
                      <td> {{$k->kembalian}} </td>
                      <td> {{$k->status}} </td>
                    </tr>
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
