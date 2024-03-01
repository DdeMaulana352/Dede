@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="table-responsive m-t-0">
    <h1>Isi form di bawah ini</h1>
    <hr>
    <form action="/inputorder/store/ck" method="post">
      @csrf
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="nama">Nama customer</label>
            <input type="text" name="nama" class="form-control" aria-controls="myTable">
    </div>
    <br>
    <div class="form-group" size='60%'>
      <label for="">Pilih layanan Paket</label>
      <select class="custom-select" name="layanan" id="">
        <option value="Cuci Kiloan reguler">Cuci Kiloan reguler</option>
        <option value="Cuci Kiloan kilat">Cuci Kiloan kilat</option>
        <option value="Cuci Kiloan express">Cuci Kiloan express</option>
      </select>
    </div>
      <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="lama">Lama pengerjaan</label>
            <input type="text" name="lama" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="qty">Kuantitas per Kg</label>
            <input type="number" name="qty" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="masuk">Tanggal Masuk order</label>
            <input type="date" name="masuk" class="form-control" value="{{date('Y')}}">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="keluar">Tanggal keluar order</label>
            <input type="date" name="keluar" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="harga">Total Harga</label>
            <input type="number" name="harga" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="status">Input bayar</label>
            <input type="number" name="nominal" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div id="myTable_filter" class="dataTables_filter" size="60%">
        <label for="status">Status order</label>
            <input type="text" name="status" class="form-control" size="50%" aria-controls="myTable">
    </div>
    <br>
    <div class="form-group" size='60%'>
      <label for="">Status bayar</label>
      <select class="custom-select" name="bayar" id="">
        <option value="Belum bayar">Belum bayar</option>
        <option value="Sudah bayar">Sudah bayar</option>
      </select>
    </div>
    <label for="nama">Alamat</label>
    <div id="myTable_filter" class="dataTables_filter" size="40%">
            <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
          <br>
      <label for="nama">Keterangan</label>
        <div id="myTable_filter" class="dataTables_filter" size="40%">
            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
          <br>
        <div class="d-grid gap-2 col-6 mx-auto">
          <button class="btn btn-primary" type="submit">kirim</button>
        </div>
      </div>
    </form>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection