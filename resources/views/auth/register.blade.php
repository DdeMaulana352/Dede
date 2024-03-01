<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="E-Laundy aplikasi laundry berbasis website">
    <meta name="keywords" content="E-Laundry,Laundry">
    <meta name="author" content="Andri Desmana">
    <title>Sign up</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
              @endif
                <div class="auth-wrapper auth-v9 px-3">
                    <div class="auth-inner py-2">
                        <!-- Forgot Password -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">Anna Clothes Laundry</h2>
                                </a>
                                <h4 class="card-title mb-1">Register</h4>
                                <hr>
                                <p class="card-text mb-2">Masukkan identitas anda</p>
                                <form action="{{ url('register/store/user') }}" method="post">
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
                    <button type="submit" class="btn btn-success mr-1 mb-1">Kirim</button>
                    <a href=" {{url('/')}}"  class="btn btn-outline-warning mr-1 mb-1">Kembali</a>
                </div>
                                </form>

                            </div>
                        </div>
                        <!-- /Forgot Password -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <script src="{{asset('backend/vendors/js/vendors.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backend/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('backend/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('backend/js/scripts/pages/page-auth-reset-password.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>