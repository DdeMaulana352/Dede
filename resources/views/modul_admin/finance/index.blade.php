@extends('layouts.backend')
@section('title','Admin - Data Finance')
@section('header','Data Finance')
@section('content')
  <div class="row">
    <div class="col-xl-5 col-md-6 col-12">
      <div class="card card-statistics">
          <div class="card-header">
              <h4 class="card-title">Pendapatan </h4>
              <div class="d-flex align-items-center">
                  <p class="card-text font-small-2 mr-25 mb-0">Pendapatan Harian</p>
              </div>
          </div>
          <div class="card-body statistics-body">
              <div class="row">
                  <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="media">
                          <div class="avatar bg-rgba-success mr-2">
                              <div class="avatar-content">
                                  <i class="feather icon-dollar-sign"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h4 class="font-weight-bolder mb-0">{{Rupiah::getRupiah($incomeD)}}</h4>
                              <p class="card-text font-small-1 mb-0">Hari ini {{date('l')}} </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="media">
                          <div class="avatar bg-rgba-warning mr-2">
                              <div class="avatar-content">
                                 <i class="feather icon-dollar-sign"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h4 class="font-weight-bolder mb-0">{{Rupiah::getRupiah($incomeDOld)}}</h4>
                              <p class="card-text font-small-1 mb-0">Kemarin {{date("l",strtotime("-1 day"))}} </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-xl-7 col-md-6 col-12">
      <div class="card card-statistics">
          <div class="card-header">
              <h4 class="card-title">Pendapatan</h4>
              <div class="d-flex align-items-center">
                  <p class="card-text font-small-2 mr-25 mb-0">Pendapatan Tahuan & Bulan</p>
              </div>
          </div>
          <div class="card-body statistics-body">
              <div class="row">
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="media">
                          <div class="avatar bg-primary mr-2">
                              <div class="avatar-content">
                                  <i class="feather icon-dollar-sign"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h5 class="font-weight-bolder mb-0">{{Rupiah::getRupiah($incomeY)}}</h5>
                              <p class="card-text font-small-1 mb-0">Tahun ini {{date('Y')}} </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="media">
                          <div class="avatar bg-info mr-2">
                              <div class="avatar-content">
                                 <i class="feather icon-dollar-sign"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h5 class="font-weight-bolder mb-0"> {{Rupiah::getRupiah($incomeM)}} </h5>
                              <p class="card-text font-small-1 mb-0">Bulan ini {{date('F')}} </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                      <div class="media">
                          <div class="avatar bg-danger mr-2">
                              <div class="avatar-content">
                                  <i class="feather icon-dollar-sign"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h5 class="font-weight-bolder mb-0">{{Rupiah::getRupiah($incomeYOld)}}</h5>
                              <p class="card-text font-small-1 mb-0">Tahun lalu {{date("Y",strtotime("-1 year")) ?? 0}} </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

  {{-- Pendapatan by bulan --}}
  <div class="row match-height">
<div class="col-lg-12 col-12">
    <div class="card card-statistics">
            <!-- Pendaparan Chart-->
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-start">
                        <div>
                            <h4 class="card-title mb-25">Chart Pendapatan By-Bulan</h4>
                            <small class="card-text mb-0">{{date('l, F Y')}}</small>
                        </div>
                        <i data-feather="settings" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body pb-0" style="min-height: 350px">
                        <div id="month-chart"></div>
                    </div>
                </div>
            </div>
            <!--/ Pendaparan Chart-->
        </div>
    </div>
</div>
</div>

  {{-- Target Tercapai --}}
  <div class="row">
    <div class="col-lg-4">
      <div class="card earnings-card bg-gradient-success">
          <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-12 col-md-12">
                    <h4>Total laundry masuk hari ini</h4>
                    <hr>
                    <h6 style="color: white;">Tercapai {{$kgDay}} Kg  <i class="feather icon-{{$kgDay >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                    <h6 style="color: white;">Tercapai {{$pcsDay}} pcs  <i class="feather icon-{{$pcsDay >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card earnings-card bg-gradient-primary">
          <div class="card-body">
              <div class="row">
              <div class="col-lg-12 col-12 col-md-12">
                    <h4>Total laundry Bulan ini</h4>
                    <hr>
                    <h6 style="color: white;">Tercapai {{$kgMonth}} Kg <i class="feather icon-{{$kgMonth >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                    <h6 style="color: white;">Tercapai {{$pcsMonth}} pcs  <i class="feather icon-{{$pcsMonth >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card earnings-card bg-gradient-danger">
          <div class="card-body">
              <div class="row">
              <div class="col-lg-12 col-12 col-md-12">
                    <h4>Total laundry Tahun ini</h4>
                    <hr>
                    <h6 style="color: white;">Tercapai {{$kgYear}} Kg <i class="feather icon-{{$kgYear >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                    <h6 style="color: white;">Tercapai {{$pcsYear}} pcs  <i class="feather icon-{{$pcsYear >= $target->target_day ? 'check-circle' : ''}}" style="color: blue"></i> </h6>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-lg-12 col-md-12 col-12">
      {{-- Pendapatan keseluruhan --}}
      <div class="card earnings-card">
          <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-12 col-md-12">
                    <h4 class="card-title mb-1">Pendapatan Keseluruhan</h4>
                    <h5 class="mb-1">{{Rupiah::getRupiah($incomeAll)}}</h5>
                    <p class="card-text text-muted font-small-2">
                        @php
                          $p = new NumberFormatter("id", NumberFormatter::SPELLOUT);
                          $result = preg_replace("/\..+/", "", $incomeAll);
                        @endphp
                      <small> {{ucwords($p->format($result))}} Rupiah</small>
                    </p>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  var $primary = '#7367F0';
  var $label_color = '#e7eef7';
  var $purple = '#df87f2';
  var $strok_color = '#b9c3cd';


  var salesavgChartoptions = {
      chart: {
        height: 270,
        toolbar: { show: false },
        type: 'line',
        dropShadow: {
            enabled: true,
            top: 20,
            left: 2,
            blur: 6,
            opacity: 0.20
        },
      },
      stroke: {
          curve: 'smooth',
          width: 4,
      },
      grid: {
          borderColor: $label_color,
      },
      legend: {
          show: false,
      },
     colors: [$purple],
      fill: {
          type: 'gradient',
          gradient: {
              shade: 'dark',
              inverseColors: false,
              gradientToColors: [$primary],
              shadeIntensity: 1,
              type: 'horizontal',
              opacityFrom: 1,
              opacityTo: 1,
              stops: [0, 100, 100, 100]
          },
      },
      markers: {
          size: 0,
          hover: {
              size: 5
          }
      },
      xaxis: {
          labels: {
              style: {
                  colors: $strok_color,
              }
          },
          axisTicks: {
              show: false,
          },
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          axisBorder: {
              show: false,
          },
          tickPlacement: 'on'
      },
      yaxis: {
          tickAmount: 5,
          labels: {
              style: {
                  color: $strok_color,
              },
              formatter: function(val) {
                  return 'Rp. ' + val;
              }
          }
      },
      tooltip: {
          x: { show: false }
      },
      series: [{
            name: "Pendapatan",
            data: [{{$chartMonth}}]
        }],

    }

   var salesavgChart = new ApexCharts(
        document.querySelector("#month-chart"),
        salesavgChartoptions
    );

    salesavgChart.render();
</script>
@endsection