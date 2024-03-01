@extends('layouts.backend')
@section('title','Tambah Customer')
@section('header','Tambah Data Customer')
@section('content')
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="card-title">Form Tambah Data Customer</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('register/store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">Nama</label>
                                <input type="text" class="form-control form-control-danger @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" placeholder="Nama Customer" autocomplete="off">
                                @error('username')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
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
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control form-control-danger @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Alamat Email" autocomplete="off">
                                @error('email')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">Sandi</label>
                                <input type="text" class="form-control form-control-danger @error('password') is-invalid @enderror" name="password" placeholder="input password" value="{{old('password')}}" autocomplete="off">
                                @error('password')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">No. telepon</label>
                                <input type="number" class="form-control form-control-danger @error('telepon') is-invalid @enderror" name="telepon" placeholder="input nomor HP" value="{{old('telepon')}}" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13">
                                @error('telepon')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">Alamat Customer</label>
                                <input type="text" class="form-control form-control-danger @error('alamat') is-invalid @enderror" name="alamat" placeholder="isi alamat disini" value="{{old('alamat')}}" autocomplete="off">
                                @error('alamat')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>
                <input type="hidden" name="auth" value="Customer">
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                    <a href=" {{url('customers')}}"  class="btn btn-outline-warning mr-1 mb-1">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection