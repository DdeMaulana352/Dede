<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="description" content="E-Laundy aplikasi laundry berbasis website">
  <meta name="keywords" content="E-Laundry,Laundry">
  <meta name="author" content="Andri Desmana">

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="{{asset('frontend/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/style.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/theme/default.css')}}" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('frontend/plugins/pace/pace.min.js')}}"></script>

    <!-- ================== END BASE JS ================== -->
    <style type="text/css">
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
  <!-- begin container -->
  <div class="container">
      <!-- begin navbar-header -->
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a href="{{url('/')}}" class="navbar-brand">
          {{$setpage != NULL ? $setpage->judul : 'Judul Disini'}}
          </a>
      </div>
      <!-- end navbar-header -->
      <!-- begin #header-navbar -->
      <div class="collapse navbar-collapse" id="header-navbar">
          <ul class="nav navbar-nav navbar-right">
              @auth
              <li> <a href="{{url('/home')}}">Welcome, {{Auth::user()->name}}</a> </li>
              <li><a href="{{('#mengapa-kami?')}}">Mengapa kami</a></li>
              <li><a href="{{('#tentang-kami')}}">Tentang kami</a></li>
              @else
              <li><a href="{{('#mengapa-kami?')}}">Mengapa kami</a></li>
              <li><a href="{{('#tentang-kami')}}">Tentang kami</a></li>
              <li><a href="{{route('login')}}">Masuk</a></li>
              <li><a href="{{url('register')}}">Sign up</a></li>
              @endauth
          </ul>
      </div>
      <!-- end #header-navbar -->
  </div>
  <!-- end container -->
</div>
    <!-- end #header -->

    <!-- begin search-banner -->
    <div class="banner has-bg">
       @yield('banner')
    </div>
    <br>
    <!-- end search-banner -->

    <!-- begin content -->
    <div class="content" >
        <!-- begin container -->
        <div class="container-fluid">
          <div id="app" >
            @yield('content')
          </div>
          <div id="mengapa-kami?">
          <div class='content' style='padding-left:5%;'>
          <h1 style='color:black;'>Mengapa memilih kami?</h1>
          <h4>1. <b>Proses Cepat dan Efisien,</b> <br>Layanan kami didukung oleh tim profesional yang terampil, menjamin pengembalian pakaian dengan cepat tanpa mengorbankan kualitas.</h4>
          <br>
          <h4>2. <b>Layanan Antar,</b> <br>Kami memahami kesibukan Anda, oleh karena itu, kami menyediakan layanan antar untuk kenyamanan Anda.</h4>
          <br>
          <h4>3. <b>Harga yang Kompetitif,</b> <br>Kami menawarkan harga yang bersaing untuk setiap layanan, memberikan nilai terbaik untuk kepuasan pelanggan.</h4>
          </div>
          </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->

    <!-- begin #footer -->
    @yield('footer')
    <!-- end #footer -->

    <!-- begin #footer-copyright -->
    <div class="footer-copyright">
        <div class="container">
            &copy; <?php echo date("Y") ?> Build With <i class="fa fa-heart" style="color:red"></i> - <a href="https://www.andridesmana.space" target="_blank" style="text-decoration:none">Andri Desmana</a>
        </div>
    </div>
    <!-- end #footer-copyright -->
	<!-- ================== BEGIN BASE JS ================== -->
  <script src="{{ asset('js/app.js') }}" ></script>
	<script src="{{asset('frontend/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('frontend/js/forum/apps.min.js')}}"></script>
    <script src="{{asset('frontend/js/swal/sweetalert2.all.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
	    $(document).ready(function() {
	        App.init();
	    });
    </script>
    @yield('scripts')
</body>
</html>
