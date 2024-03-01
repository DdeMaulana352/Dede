@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="card">
          <div class="card-body">
          <h4 class="card-title">
              Daftar harga paket cuci satuan
              <a name="tambah" id="" class="btn btn-primary" href="/admin/tambah/cs" role="button">Tambah baru</a>
            </h4>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pakaian</th>
                    <th>Lama proses reguler</th>
                    <th>Lama proses kilat</th>
                    <th>Lama proses express</th>
                    <th>Kuantitas per pcs</th>
                    <th>Harga reguler</th>
                    <th>Harga kilat</th>
                    <th>Harga express</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($paketcs as $key => $paket)
                    <tr>
                      <td> {{$key+1}} </td>
                      <td> {{$paket->pakaian}} </td>
                      <td> {{$paket->durasi_kerja}} </td>
                      <td> {{$paket->durasi_kerja_kilat}} </td>
                      <td> {{$paket->durasi_kerja_express}} </td>
                      <td> {{$paket->qty_perpcs}} Pcs</td>
                      <td> {{$paket->harga_reguler}} </td>
                      <td> {{$paket->harga_kilat}} </td>
                      <td> {{$paket->harga_express}} </td>
                      <td><a href="/admin/hargacs/edit/{{ $paket->id }}" class="btn btn-info btn-sm">Edit harga</a>
                       <a href="/admin/hargacs/hapus/{{ $paket->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Layanan cuci satuan akan dihapus dari daftar setelah di klik, ingin melanjutkan? ')">Hapus</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
               </form>
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