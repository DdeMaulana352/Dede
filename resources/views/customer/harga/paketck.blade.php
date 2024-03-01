@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="card">
          <div class="card-body">
          <h4 class="card-title">
              Daftar harga paket cuci Kiloan
            </h4>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Paket cuci</th>
                    <th>Kuantitas</th>
                    <th>Lama proses</th>
                    <th>Harga</th>
                    <th>Total</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($paketck as $key => $paket)
                    <tr>
                      <td> {{$key+1}} </td>
                      <td> {{$paket->paket_layanan}} </td>
                      <td> {{$paket->qty_perkg}} Kg</td>
                      <td> {{$paket->durasi_kerja}} </td>
                      <td> {{$paket->harga_perkg}} </td>
                      <td> {{$paket->total_harga}} </td>
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
