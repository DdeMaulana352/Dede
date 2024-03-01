@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<div class="card">
          <div class="card-body">
          <h4 class="card-title">
              Daftar harga paket cuci satuan
            </h4>
            <div class="table-responsive m-t-0">
              <table id="myTable" class="table display table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pakaian</th>
                    <th>Kuantitas</th>
                    <th>Layanan reguler</th>
                    <th>Layanan kilat</th>
                    <th>Layanan express</th>
                    <th>Harga layanan reguler</th>
                    <th>Harga layanan kilat</th>
                    <th>Harga layanan express</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($paketcs as $key => $paket)
                    <tr>
                      <td> {{$key+1}} </td>
                      <td> {{$paket->pakaian}} </td>
                      <td> {{$paket->qty_perpcs}} Pcs</td>
                      <td> {{$paket->durasi_kerja}} </td>
                      <td> {{$paket->durasi_kerja_kilat}} </td>
                      <td> {{$paket->durasi_kerja_express}} </td>
                      <td> {{$paket->harga_reguler}} </td>
                      <td> {{$paket->harga_kilat}} </td>
                      <td> {{$paket->harga_express}} </td>
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
