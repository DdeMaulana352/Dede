@extends('layouts.backend')
@section('title','Admin - Detail Data Customer')
@section('header','Detail Data Customer')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Data Karyawan</h4>
        </div>
        <hr>
        <form action="/karyawan/update/{{ $karyawan->id }}" method="post">
          @csrf
        <div class="card-content">
            <div class="row">
              <div class="card-body">
                <div class="card-text">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Karyawan</dt>
                        <dd class="col-sm-4">
                          <div class="input-group">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$karyawan->name}}">
                          </div>
                          @error('name')
                                      <strong style="color:red;">{{ $message }}</strong>
                          @enderror
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Email Karyawan</dt>
                        <dd class="col-sm-4">
                        <div class="input-group">
                            <input type="email" name="email" id="name" class="form-control @error('email') is-invalid @enderror" value="{{$karyawan->email}}">
                          </div>
                          @error('email')
                                      <strong style="color:red;">{{ $message }}</strong>
                                @enderror
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">No. Telepon</dt>
                        <dd class="col-sm-4">
                          <div class="input-group">
                            <input type="number" name="no_telp" id="name" class="form-control @error('no_telp') is-invalid @enderror" value="{{$karyawan->no_telp}}">
                          </div>
                          @error('no_telp')
                                      <strong style="color:red;">{{ $message }}</strong>
                                @enderror
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Alamat Karyawan</dt>
                        <dd class="col-sm-4">
                            <div class="form-group">
                              <textarea name="alamat" id="" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{$karyawan->alamat}}</textarea>
                              @error('alamat')
                                      <strong style="color:red;">{{ $message }}</strong>
                                @enderror
                            </div>
                        </dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Jenis Kelamin Karyawan</dt>
                        <dd class="col-sm-4">
                        <div class="input-group">
                            <select class="form-control  @error('jk') is-invalid @enderror" name="jk" id="jk">
                            <option value="">-- pilih jenis kelamin --</option>
                            <option value="Perempuan" {{ $karyawan->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Laki-laki" {{ $karyawan->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        </select>
                          </div>
                          @error('jk')
                                      <strong style="color:red;">{{ $message }}</strong>
                                @enderror
                        </dd>
                    </dl>
                    
                    <button type="submit" class="btn btn-success">Simpan perubahan</button>
                  </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>

@endsection