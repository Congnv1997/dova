@extends('layout.index')
@section('content')
<section id="content">
                    <section class="hbox stretch">
                    <section class="section-layout-2">
<section class="vbox">
    <section class="scrollable wrapper w-f">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="statistic">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <a href="#" class="block padder-v hover">
                               <span class="i-s i-s-2x pull-left m-r-sm">
                                   <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                   <i class="i i-book i-sm text-white"></i>
                               </span>
                               <span class="clear">
                                   <span id="ctl21_hv_inclass" class="h3 block m-t-xs text-primary">0</span>
                                   <small class="text-muted text-u-c">Đang học</small>
                               </span>
                           </a>
                       </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="#" class="block padder-v hover">
                               <span class="i-s i-s-2x pull-left m-r-sm">
                                   <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                   <i class="i i-book i-sm text-white"></i>
                               </span>
                               <span class="clear">
                                   <span id="ctl21_hv_inclass" class="h3 block m-t-xs text-primary">0</span>
                                   <small class="text-muted text-u-c">Đang học</small>
                               </span>
                           </a>
                       </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="#" class="block padder-v hover">
                               <span class="i-s i-s-2x pull-left m-r-sm">
                                   <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                   <i class="i i-book i-sm text-white"></i>
                               </span>
                               <span class="clear">
                                   <span id="ctl21_hv_inclass" class="h3 block m-t-xs text-primary">0</span>
                                   <small class="text-muted text-u-c">Đang học</small>
                               </span>
                           </a>
                       </div>
                        <div class="col-lg-3 col-md-6">
                             <a href="#" class="block padder-v hover">
                                <span class="i-s i-s-2x pull-left m-r-sm">
                                    <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                    <i class="i i-book i-sm text-white"></i>
                                </span>
                                <span class="clear">
                                    <span id="ctl21_hv_inclass" class="h3 block m-t-xs text-primary">0</span>
                                    <small class="text-muted text-u-c">Đang học</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.statistic -->
                <!-- form xử lí thời gian check in_ check out -->
                <form action="{{url("staff/timecard")}}" method="post">
                    @csrf
                    <input type="hidden" name="staff_id" value="{{$staff_id}}">
                    <div class="form-group">        
                        Hôm nay ngày: <input type="text" name="check_day" id="date" >
                    </div>
                    <div class="form-group">
                        <input onclick="getCheckin()" type="button" class="btn btn-info" value="Check in:" name="">
                        <input style="margin-left: 9px" value="" name="check_in" id="check_in">
                    </div>
                    <div class="form-group">
                            <input onclick="getCheckout()" type="submit" class="btn btn-info" value="Check out:" name="" id="">
                            <input value="" name="check_out" id="check_out">
                    </div>
                </form>
@endsection
@section('script')
    <script type="text/javascript">
        var today = new Date();
        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
        document.getElementById("date").value = date;
        function getCheckin() {
            var checkin = today.getHours() + ":" + today.getMinutes();
            document.getElementById("check_in").value = checkin;       
        }
        function getCheckout() {
            var checkout = today.getHours() + ":" + today.getMinutes();
            document.getElementById("check_out").value = checkout;       
        }
    </script>
@endsection