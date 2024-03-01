@extends('layouts.backend')
@section('title','Form Tambah Data Karyawan')
@section('header','Tambah Karyawan')
@section('content')
<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Tambah Data Karyawan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                @error('errors')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <form action="/register/karyawan" method="POST" class="form form-vertical">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-4 col-xl-4 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{old('name')}}" autocomplete="off">
                                        @error('name')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">Jenis kelamin</label>
                        <select class="form-control form-control-danger @error('jk') is-invalid @enderror" name="jk" id="jk" onchange="updateOldValue()">
                            <option value="">-- pilih jenis kelamin --</option>
                            <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        </select>
                        @error('jk')
                          <span class="invalid-feedback text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                        </div>

                            <div class="col-lg-4 col-xl-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="email" name="email" id="email-id-icon" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}" autocomplete="off">
                                        @error('email')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xl-4 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="text" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" value="{{old('password')}}" autocomplete="off">
                                        @error('password')
                                          <span class="invalid-feedback text-danger text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">No. telepon</label>
                                <input type="number" class="form-control form-control-danger @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="input nomor HP" value="{{old('no_telp')}}" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13">
                                @error('no_telp')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                            <div class="col-lg-4 col-xl-4 col-12">
                                <div class="form-group">
                                    <label for="alamat-karyawan">Alamat Karyawan</label>
                                    <div class="position-relative">
                                       <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat-karyawan" placeholder="input alamat disini" rows="3" value="{{old('alamat')}}" autocomplete="off">
                                       @error('alamat')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                              <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                              <a href=" {{route('karyawan.index')}} " class="btn btn-outline-warning mr-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection