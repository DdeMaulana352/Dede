@extends('layouts.frontend')
@section('title','Selamat Datang')
@section('header')
  @include('frontend.header')
@endsection
@section('banner')
{{-- banner --}}
    @include('frontend.banner')
{{-- End banner --}}
@endsection

@section('content')
    @include('frontend.content')
@endsection

@section('footer')
  @include('frontend.footer')

{{-- Whatsapp Button Start--}}
  <a href="https://api.whatsapp.com/send?phone=6285156131790&text=Hai%20Admin%2C%20Saya%20mau%20info%20detail%20produk%20laundry.%20Mohon%20dibantu%2C%20terima%20kasih" target="blank_">
    <img src="{{asset('frontend/img/wa.png')}}" class="wabutton" alt="WhatsApp-Button">
  </a>
{{-- End: Whatsapp Button --}}
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on('click', '.search-btn', function(e){
      _curr_val = $('#search_status').val();
      $('#search_status').val(_curr_val + $(this).html());
  });

  $(document).on('click', '#search-btn', function (e) {
      var search_status = $("#search_status").val();
      $.get('pencarian-laundry',{'_token': $('meta[name=csrf-token]').attr('content'),search_status:search_status}, function(resp){
            if (resp != 0) {
                  $(".modal_status").show();
                  $("#customer").html(resp.customer);
                  $("#tgl_transaksi").html(resp.tgl_transaksi);
                  $("#status_order").html(resp.status_order);
            }
            else if ($("#status_order").html(resp.status_order) == "Pengambilan") {
                swal({html: "Segera lakukan pengambilan ke toko"})
            }else{
                swal({html: "No Invoice Tidak Terdaftar!"})
            }
      });
  });
  function close_dlgs(){
        $(".modal_status").hide();
        $("#search_status").val("");
  }
</script>
@endsection