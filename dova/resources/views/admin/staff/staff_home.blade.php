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
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="nhan-su/danhsach" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="fa fa-list text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-warning">Danh sách nhân sự</span>
                                    <small class="text-muted text-u-c">Tất cả nhân sự</small>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a  target="_bank" href="nhan-su/thong-ke" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                                    <i class="i i-stats icon text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-warning">Thống kê</span>
                                    <small class="text-muted text-u-c">Thống kê chung cho nhân sự</small>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a  target="_bank" href="staff/timecard" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                                    <i class="fa fa-check-circle  icon text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-warning">Chấm Công</span>
                                    <small class="text-muted text-u-c">Chấm điểm  nhân sự</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.scrollable .wrapper -->
   <footer class="footer bg-white b-t b-light">
            </footer>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen"
        data-target="#nav"></a>
</section>
                            <!-- /.vbox -->
                        </section>
                        <!-- /.section-layout-2 -->

                    </section>
                    <!-- /.hbox.stretch -->

                </section>
                <!-- /#content -->
@endsection
