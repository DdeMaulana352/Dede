@extends('layouts.backend')
@section('title','Dashboard Customer')
@section('content')
<h1>Laporan order customer</h1>
<hr>
<div class="row match-height">
    <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="laporan/cuci-dry-clean"> 
                        <img src="{{asset('backend/images/pages/dry-clean.png')}}" alt="dry clean" width="100%"> 
                        <h1>Cuci dry clean</h1> 
                    </a>
              </div>
          </div>
      </div>
      
      <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="laporan/cuci-komplit"> 
                        <img src="{{asset('backend/images/pages/cuci-komplit.png')}}" alt="dry clean" width="100%"> 
                        <h1>Cuci Kiloan</h1>
                         
                    </a>
              </div>
          </div>
      </div>

      <div class="col-xl-4 col-md-6 col-12">
          <div class="card card-statistics">
              <div class="card-body">
                    <a href="laporan/satuan"> 
                        <img src="{{asset('backend/images/pages/satuan.png')}}" alt="dry clean" width="100%"> 
                        <h1>Cuci Satuan</h1>
                        
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection