@extends('layouts.backend')
@section('title','Tambah Customer')
@section('header','Tambah Data Customer')
@section('content')
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="card-title">Tambah harga order cuci satuan</h4>
        </div>
        <div class="card-body">
            <form action="/hargacs/store/" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-8">
                            <div class="form-group has-success">
                              <label class="control-label">Pakaian</label>
                              <input type="text" class="form-control" name="pakaian" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                              <label class="control-label">Kuantitas per PCS</label>
                              <input type="number" class="form-control" name="qty_perpcs" min="0" id="kuantitas" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                            <label class="control-label">Harga layanan reguler</label>
                            <input type="number" class="form-control" name="reguler" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                            <label class="control-label">Harga layanan kilat</label>
                            <input type="number" class="form-control" name="kilat" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                            <label class="control-label">Harga layanan express</label>
                            <input type="number" class="form-control" name="express" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                              <label class="control-label">Lama pengerjaan paket reguler</label>
                              <input type="text" class="form-control" name="lama1" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                              <label class="control-label">Lama pengerjaan paket kilat</label>
                              <input type="text" class="form-control" name="lama2" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                              <label class="control-label">Lama pengerjaan paket express</label>
                              <input type="text" class="form-control" name="lama3" id="" aria-describedby="helpId" autocomplete="off">                            
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>
                <input type="hidden" name="auth" value="Customer">
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                    <a href=" {{url('/customer')}}"  class="btn btn-outline-warning mr-1 mb-1">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
  var a =  document.getElementById('kuantitas');
 a.value = 1;
</script>