@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<h1>Lihat riwayat order customer</h1>
<hr>
<div class="row match-height">
    <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="/customer/riwayat/dc"> 
                        <img src="{{asset('backend/images/pages/dry-clean.png')}}" alt="dry clean" width="100%"> 
                        <center><h1>Cuci dry clean</h1>
                        <span>tidak melibatkan air sehingga pakaian tetap relatif kering selama proses pencucian</span>
                    </center> 
                    </a>
              </div>
          </div>
      </div>
      
      <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="/customer/riwayat/ck"> 
                        <img src="{{asset('backend/images/pages/cuci-komplit.png')}}" alt="dry clean" width="100%"> 
                        <center><h1>Cuci Kiloan</h1>
                        <span>cuci reguler dari proses jemput-cuci-setrika-hingga hantar kembali ke tempat pelanggan</span>
                    </center> 
                    </a>
              </div>
          </div>
      </div>

      <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="/customer/riwayat/cs"> 
                        <img src="{{asset('backend/images/pages/satuan.png')}}" alt="dry clean" width="100%"> 
                        <center><h1>Cuci Satuan</h1>
                        <span>mencuci pakaian berupa baju, celana atau yang lainnya dengan jumlah satuan</span>
                    </center> 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection