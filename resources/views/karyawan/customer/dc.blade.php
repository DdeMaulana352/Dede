<?php 
  $harini = date("Y-m-d"); 
  $besok = date("Y-m-d", strtotime("+1 day"));
?>
@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
    <h1>Isi form di bawah ini</h1>
    <hr>
    <form action="/inputorder/store/dc" method="post">
      @csrf
      <div class="card card-outline-info">
      <div class="card-body">
      <div class="form-body">
                    <div class="row p-t-20">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nama customer</label>
                                <input type="text" name="nama" class="form-control" size="50%" aria-controls="myTable" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Pilih layanan paket</label>
                                  <select class="custom-select" name="layanan" id="slct1" required>
                                    <option value="">-- Tentukan layanan paket disini --</option>

                                  </select>                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="lama">Lama pengerjaan</label>
                              <input type="text" name="lama" class="form-control" size="50%" aria-controls="myTable" id="lama">                            
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="masuk">Tanggal Masuk order</label>
                              <input type="date" name="masuk" class="form-control" size="50%" id="date-picker">                        
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="keluar">Tanggal keluar order</label>
                              <input type="date" name="keluar" class="form-control" size="50%" id="date-picker2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="harga">Total Harga</label>
                              <input type="text" name="harga" class="form-control" size="50%" aria-controls="myTable" id='slct2' required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="qty">Kuantitas /<b>per KG</b></label>
                              <input type="number" min="0" name="qty" class="form-control" size="50%" id="qty" autocomplete="off">                        
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="status">Input bayar</label>
                              <input type="number" id="ib" name="nominal" min="0" class="form-control" size="50%" aria-controls="myTable" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="status">Status order</label>
                              <input type="text" autocomplete="off" name="status" class="form-control" size="50%" id="sts_order" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Status bayar</label>
                              <select class="custom-select" name="bayar" id="" required>
                                <option value="Belum bayar">Belum bayar</option>
                                <option value="Sudah bayar">Sudah bayar</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="status">Alamat customer</label>
                              <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required>{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="status">Keterangan</label>
                              <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                          <button class="btn btn-primary" type="submit">kirim</button>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>
          </div>
      </div>
    </div>
    </form>
 <script>
var dropdown = document.getElementById("slct1");
var form1 = document.getElementById("lama");
var endDateInput = document.getElementById("endDateInput"); // Gantilah dengan ID elemen input tanggal selesai Anda
var datePicker2 = document.getElementById("date-picker2");
var paketJson = JSON.parse('{!! $paketJson !!}');

for (var i = 0; i < paketJson.length; i++) {
    var option = document.createElement("option");
    option.text = paketJson[i].paket_layanan;
    option.value = paketJson[i].paket_layanan;
    dropdown.add(option);
}

// Tambahkan event listener untuk mendeteksi perubahan pada dropdown
dropdown.addEventListener("change", function () {
    // Ambil nilai terpilih dari dropdown
    var selectedValue = dropdown.value;

    // Loop melalui data paketJson untuk menemukan paket_layanan yang sesuai
    for (var i = 0; i < paketJson.length; i++) {
        if (selectedValue == paketJson[i].paket_layanan) {
            // Isi nilai form1 dengan nilai yang sesuai dari paketJson
            form1.value = paketJson[i].durasi_kerja;
            document.getElementById('date-picker').value = <?= json_encode($harini) ?>;
            document.getElementById('date-picker2').value = paketJson[i].tanggal_keluar;
            document.getElementById('slct2').value = paketJson[i].total_harga;
            document.getElementById('sts_order').value = "Cuci";
            document.getElementById('qty').value = 1;

            // Set tanggal selesai sesuai dengan opsi yang dipilih
            setEndDateBasedOnOption(paketJson[i].durasi_kerja);
        }
    }
});

function setEndDateBasedOnOption(durasiKerja) {
    // Jika durasi_kerja adalah 8 jam, set tanggal keluar ke hari ini
    if (durasiKerja.includes("jam") || durasiKerja.includes("Jam")) {
        datePicker2.value = <?= json_encode($harini) ?>;
    } else if (durasiKerja === "1 hari") {
        var tomorrowDate = new Date();
        tomorrowDate.setDate(tomorrowDate.getDate() + 1);

        // Format tanggal sesuai dengan kebutuhan
        var formattedEndDate = tomorrowDate.toISOString().split('T')[0];

        // Set tanggal keluar ke datePicker2
        datePicker2.value = formattedEndDate;
    } else if (durasiKerja === "2 hari") {
        var tomorrowDate = new Date();
        tomorrowDate.setDate(tomorrowDate.getDate() + 2);

        // Format tanggal sesuai dengan kebutuhan
        var formattedEndDate = tomorrowDate.toISOString().split('T')[0];

        // Set tanggal keluar ke datePicker2
        datePicker2.value = formattedEndDate;
    } else if (durasiKerja === "3 hari") {
        var tomorrowDate = new Date();
        tomorrowDate.setDate(tomorrowDate.getDate() + 3);

        // Format tanggal sesuai dengan kebutuhan
        var formattedEndDate = tomorrowDate.toISOString().split('T')[0];

        // Set tanggal keluar ke datePicker2
        datePicker2.value = formattedEndDate;
    } else {
      datePicker2.value = null;
    }
}
 </script>
 @endsection