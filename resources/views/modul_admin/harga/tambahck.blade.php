@extends('layouts.backend')
@section('title','Admin - Detail Data Customer')
@section('header','Detail Data Customer')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah harga order cuci kiloan</h4>
        </div>
        <hr>
        <form action="/hargack/store/" method="post">
          @csrf
        <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                    <dl class="row">
                        <dt class="col-sm-4">Paket layanan</dt>
                        <dd class="col-sm-4">
                          <div class="input-group">
                              <input type="text" class="form-control" name="paket_layanan" id="" aria-describedby="helpId" autocomplete="off">
                            </div>
                          </div>
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Lama pengerjaan</dt>
                        <dd class="col-sm-4">
                          <div class="input-group">
                          <input type="text" class="form-control" name="durasi_kerja" id="" aria-describedby="helpId" autocomplete="off">
                          </div></dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Harga per Kg</dt>
                        <dd class="col-sm-4">
                            <div class="input-group">
                            <input type="number" class="form-control" min="0" name="harga_perkg" id="" aria-describedby="helpId" autocomplete="off">
                            </div>
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Kuantitas per/KG</dt>
                        <dd class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" name="qty_perkg" min="0" min="0" aria-describedby="helpId" autocomplete="off">
                          </div>
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Total harga</dt>
                        <dd class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" name="total_harga" id="" aria-describedby="helpId" autocomplete="off">
                          </div>
                        </dd>
                    </dl>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
  
  <script>
    // Ambil elemen-elemen yang diperlukan
var qtyInput = document.querySelector('input[name="qty_perkg"]');
var hargaPerKgInput = document.querySelector('input[name="harga_perkg"]');
var totalHargaInput = document.querySelector('input[name="total_harga"]');

// Tambahkan event listener pada input kuantitas dan harga per kilogram
qtyInput.addEventListener('input', updateTotalHarga);
hargaPerKgInput.addEventListener('input', updateTotalHarga);

// Fungsi untuk mengupdate total harga
function updateTotalHarga() {
    // Ambil nilai kuantitas dan harga per kilogram
    var kuantitas = parseFloat(qtyInput.value) || 0;
    var hargaPerKg = parseFloat(hargaPerKgInput.value) || 0;

    // Hitung total harga
    var totalHarga = kuantitas * hargaPerKg;

    // Isi nilai pada elemen total harga
    totalHargaInput.value = totalHarga;
}
  </script>

@endsection